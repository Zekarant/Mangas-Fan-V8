<?php

namespace App\Service;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\SecurityBundle\Security;
use KnpU\OAuth2ClientBundle\Client\ClientRegistry;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class SocialAuthenticatorService
{
    private $entityManager;
    private $userPasswordHasher;
    private $tokenStorage;
    private $security;

    public function __construct(EntityManagerInterface $entityManager, UserPasswordHasherInterface $userPasswordHasher, TokenStorageInterface $tokenStorage, Security $security, private readonly string $cdnUrl)
    {
        $this->entityManager = $entityManager;
        $this->userPasswordHasher = $userPasswordHasher;
        $this->tokenStorage = $tokenStorage;
        $this->security = $security;
    }

    public function redirectToProvider(ClientRegistry $clientRegistry, $providerName)
    {
        return $clientRegistry->getClient($providerName)->redirect([], []);
    }

    public function authenticateUser(ClientRegistry $clientRegistry, $providerName)
    {
        $user = $this->security->getUser();
        if ($user) {
            return new RedirectResponse('/');
        } else {
            $client = $clientRegistry->getClient($providerName);
            $user = $client->fetchUser();
            $existingUser = $this->entityManager->getRepository(User::class)->findOneBy(['email' => $user->getEmail()]);
            if (null !== $existingUser) {
                $token = new UsernamePasswordToken(
                    $existingUser,
                    $this->getUsernameFromProvider($providerName, $user),
                    $existingUser->getRoles()
                );

                $this->tokenStorage->setToken($token);
            } else {
                $newUser = new User;
                $newUser->setUsername($this->getUsernameFromProvider($providerName, $user));
                $newUser->setRoles(['ROLE_USER']);
                $newUser->setEmail($user->getEmail());
                $newUser->setAvatar($this->getAvatarForProvider($providerName, $user,));

                $randomPassword = bin2hex(random_bytes(12));
                // Hacher le mot de passe aléatoire
                $hashedPassword = $this->userPasswordHasher->hashPassword($newUser, $randomPassword);
                $newUser->setPassword($hashedPassword);
                $this->entityManager->persist($newUser);
                $this->entityManager->flush();

                $token = new UsernamePasswordToken($newUser, $hashedPassword, $newUser->getRoles());
                $this->tokenStorage->setToken($token);
            }
            return new RedirectResponse('/');
        }
    }

    private function getUsernameFromProvider(string $providerName, $user): string
    {
        switch ($providerName) {
            case 'discord':
                return ucfirst($user->getUsername());
            case 'google':
                return $user->getFirstName();
            default:
                return $user->getName();
        }
    }

    private function getAvatarForProvider(string $providerName, $user): string
    {
        switch ($providerName) {
            case 'discord':
                return sprintf('%s/avatars/%s/%s.png', $this->cdnUrl, $user->getId(), $user->getAvatarHash());
            case 'google':
                return $user->getAvatar();
            default:
                return $user->getPictureUrl();
        }
    }
}
