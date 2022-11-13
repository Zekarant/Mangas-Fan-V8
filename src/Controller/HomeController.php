<?php

namespace App\Controller;

use App\Repository\AnimesRepository;
use App\Repository\ArticlesAnimeRepository;
use App\Repository\NewsRepository;
use App\Repository\TomeMangasRepository;
use App\Service\WebhookDiscordService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

class HomeController extends AbstractController
{
    private WebhookDiscordService $webhookDiscordService;

    public function __construct(WebhookDiscordService $webhookDiscordService) {
        $this->webhookDiscordService = $webhookDiscordService;
    }

    /**
     * @throws TransportExceptionInterface
     */
    #[Route('/', name: 'app_home')]
    public function index(NewsRepository $newsRepository, AnimesRepository $animesRepository, TomeMangasRepository $tomeMangasRepository, ArticlesAnimeRepository $articlesAnimeRepository): Response
    {

        return $this->render('home/index.html.twig', [
            'news' => $newsRepository->findBy(array(), array('id' => 'DESC'), 3),
            'lastAnimes' => $animesRepository->findBy(array(), array('id' => 'DESC'), 6),
            'coupdeCoeur' => $animesRepository->findOneBy(array('coupCoeur' => 1)),
            'lastMangas' => $tomeMangasRepository->findBy(array(), array('createdAt' => 'DESC'), 6),
            'lastArticlesAnime' => $articlesAnimeRepository->findBy(array(), array('createdAt' => 'DESC'), 4)
        ]);
    }
}