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
            'news' => $newsRepository->findBy(array('visibility' => 1), array('id' => 'DESC'), 3),
            'last_animes' => $animesRepository->findBy(array(), array('id' => 'DESC'), 6),
            'month_favorite' => $animesRepository->findOneBy(array('coupCoeur' => 1)),
            'last_mangas' => $tomeMangasRepository->findBy(array(), array('createdAt' => 'DESC'), 6),
            'last_articles_anime' => $articlesAnimeRepository->findBy(array(), array('createdAt' => 'DESC'), 4)
        ]);
    }
}