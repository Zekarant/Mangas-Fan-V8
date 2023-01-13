<?php

namespace App\Controller;

use App\Repository\Anime\AnimeRepository;
use App\Repository\Anime\ArticleAnimeRepository;
use App\Repository\Manga\TomeRepository;
use App\Repository\NewsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(NewsRepository $newsRepository, AnimeRepository $animeRepository, TomeRepository $tomeMangasRepository, ArticleAnimeRepository $articleAnimeRepository): Response
    {

        return $this->render('home/index.html.twig', [
            'news' => $newsRepository->findBy(array(), array('id' => 'DESC'), 3),
            'last_animes' => $animeRepository->findBy(array(), array('id' => 'DESC'), 6),
            'month_favorite' => $animeRepository->findOneBy(array('coupCoeur' => 1)),
            'last_mangas' => $tomeMangasRepository->findBy(array(), array('createdAt' => 'DESC'), 6),
            'last_articles_anime' => $articleAnimeRepository->findBy(array(), array('createdAt' => 'DESC'), 4)
        ]);
    }
}