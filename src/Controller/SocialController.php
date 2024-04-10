<?php

namespace App\Controller;

use App\Service\SocialAuthenticatorService;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use KnpU\OAuth2ClientBundle\Client\ClientRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SocialController extends AbstractController
{
    private $socialAuthenticatorService;

    public function __construct(SocialAuthenticatorService $socialAuthenticatorService)
    {
        $this->socialAuthenticatorService = $socialAuthenticatorService;
    }

    #[Route(path: '/connect/{provider}', name: 'connect', requirements: ['provider' => 'discord|facebook|google'])]
    public function socialConnection(ClientRegistry $clientRegistry, string $provider)
    {
        return $this->socialAuthenticatorService->redirectToProvider($clientRegistry, $provider);
    }


    #[Route(path: '/connect/discord/check', name: 'connect_discord_check')]
    public function checkDiscordConnection(ClientRegistry $clientRegistry)
    {
        return $this->socialAuthenticatorService->authenticateUser($clientRegistry, 'discord');
    }

    #[Route(path: '/connect/facebook/check', name: 'connect_facebook_check')]
    public function checkFacebookConnection(ClientRegistry $clientRegistry)
    {
        return $this->socialAuthenticatorService->authenticateUser($clientRegistry, 'facebook');
    }

    #[Route(path: '/connect/google/check', name: 'connect_google_check')]
    public function checkGoogleConnection(ClientRegistry $clientRegistry)
    {
        return $this->socialAuthenticatorService->authenticateUser($clientRegistry, 'google');
    }
}
