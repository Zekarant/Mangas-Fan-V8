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

class GoogleController extends AbstractController
{
    #[Route(path: '/connect/google', name: 'connect_google')]
    public function connectAction(ClientRegistry $clientRegistry)
    {
        return $clientRegistry->getClient('google')->redirect([], []);
    }

    #[Route(path: '/connect/google/check', name: 'connect_google_check')]
    public function connectCheckAction(EntityManagerInterface $entityManager, ClientRegistry $clientRegistry, UserPasswordHasherInterface $userPasswordHasher, TokenStorageInterface $tokenStorage)
    {
        $user = $this->getUser();

        if ($user) {
            // L'utilisateur existe déjà, il est authentifié, redirigez-le vers la page d'accueil
            return $this->redirectToRoute('app_home');
        } else {
            // L'utilisateur n'existe pas dans la base de données, nous devons l'ajouter
            $client = $clientRegistry->getClient('google');

            try {
                $user = $client->fetchUser();
                $existingUser = $entityManager->getRepository(User::class)->findOneBy(['email' => $user->getEmail()]);
                if ($existingUser) {
                    $token = new UsernamePasswordToken($existingUser, $user->getFirstName(), $existingUser->getRoles());
                    $tokenStorage->setToken($token);
                } else {
                    $newUser = new User;
                    $newUser->setUsername($user->getFirstName());
                    $newUser->setRoles(['ROLE_USER']);
                    $newUser->setEmail($user->getEmail());
                    $newUser->setAvatar($user->getAvatar());
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
                

                
            } catch (IdentityProviderException $e) {
                // something went wrong!
                // probably you should return the reason to the user
                var_dump($e->getMessage()); die;
            }
        }
    }

    
}
