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
            'news' => $newsRepository->findAll(),
            'lastAnimes' => $animesRepository->findBy(array(), array('id' => 'DESC'), 6),
            'coupdeCoeur' => $animesRepository->findOneBy(array('coupCoeur' => 1)),
            'lastMangas' => $tomeMangasRepository->findBy(array(), array('createdAt' => 'DESC'), 6),
            'lastArticlesAnime' => $articlesAnimeRepository->findBy(array(), array('createdAt' => 'DESC'), 4)
        ]);
    }
}