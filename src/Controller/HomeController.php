<?php

namespace App\Controller;

use App\Repository\AnimesRepository;
use App\Repository\ArticlesAnimeRepository;
use App\Repository\NewsRepository;
use App\Repository\TomeMangasRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(NewsRepository $newsRepository, AnimesRepository $animesRepository, TomeMangasRepository $tomeMangasRepository, ArticlesAnimeRepository $articlesAnimeRepository): Response
    {

        return $this->render('home/index.html.twig', [
            'news' => $newsRepository->findBy(['visibility' => 1], ['id' => 'DESC'], 3),
            'last_animes' => $animesRepository->findBy([], ['id' => 'DESC'], 6),
            'month_favorite' => $animesRepository->findOneBy(['coupCoeur' => 1]),
            'last_mangas' => $tomeMangasRepository->findBy([], ['createdAt' => 'DESC'], 6),
            'last_articles_anime' => $articlesAnimeRepository->findBy([], ['createdAt' => 'DESC'], 4)
        ]);
    }
}