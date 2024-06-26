<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Routing\Annotation\Route;
use KnpU\OAuth2ClientBundle\Client\ClientRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use League\OAuth2\Client\Provider\Exception\IdentityProviderException;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class DiscordController extends AbstractController
{
    #[Route(path: '/connect/discord', name: 'connect_discord')]
    public function discordConnection(ClientRegistry $clientRegistry)
    {
        return $clientRegistry->getClient('discord')->redirect([], []);
    }

    #[Route(path: '/connect/discord/check', name: 'connect_discord_check')]
    public function connectCheck(EntityManagerInterface $entityManager, ClientRegistry $clientRegistry, UserPasswordHasherInterface $userPasswordHasher, TokenStorageInterface $tokenStorage)
    {
        $user = $this->getUser();

        if ($user) {
            // L'utilisateur existe déjà, il est authentifié, redirigez-le vers la page d'accueil
            return $this->redirectToRoute('app_home');
        } else {
            $client = $clientRegistry->getClient('discord');
            
                $user = $client->fetchUser();
                $existingUser = $entityManager->getRepository(User::class)->findOneBy(['email' => $user->getEmail()]);
                if ($existingUser) {
                    $token = new UsernamePasswordToken($existingUser, $user->getUsername(), $existingUser->getRoles());
                    $tokenStorage->setToken($token);
                } else {
                    $newUser = new User;
                    $newUser->setUsername(ucfirst($user->getUsername()));
                    $newUser->setRoles(['ROLE_USER']);
                    $newUser->setEmail($user->getEmail());
                    $newUser->setAvatar("https://cdn.discordapp.com/avatars/" . $user->getId() . "/" . $user->getAvatarHash() . ".png");
                    $randomPassword = bin2hex(random_bytes(12)); // Génère un mot de passe de 24 caractères
                    // Hachez le mot de passe aléatoire
                    $hashedPassword = $userPasswordHasher->hashPassword($newUser, $randomPassword);
                    $newUser->setPassword($hashedPassword);
                    $entityManager->persist($newUser);
                    $entityManager->flush();

                    // Authentifier l'utilisateur nouvellement créé
                    $token = new UsernamePasswordToken($newUser, $hashedPassword, $newUser->getRoles());
                    $tokenStorage->setToken($token);
                    
                }
                return $this->redirectToRoute('app_home');
                

                
            
        }
    }
}