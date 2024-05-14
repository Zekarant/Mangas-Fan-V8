<?php

namespace App\Controller;

use App\Entity\News;
use App\Repository\AnimeRepository;
use App\Repository\ArticleAnimeRepository;
use App\Repository\NewsRepository;
use App\Repository\TomeMangaRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(NewsRepository $newsRepository, AnimeRepository $animeRepository, TomeMangaRepository $tomeMangaRepository, ArticleAnimeRepository $articlesAnimeRepository): Response
    {
        $newsList = $newsRepository->findBy(['visibility' => 1], ['id' => 'DESC'], 3);

        $newsData = [];

        foreach ($newsList as $currentNews) {
            // @todo: should be ameliorate
            $existingInteraction = $currentNews->getOwnReaction($this->getUser());

            $newsData[] = [
                'news' => $currentNews,
                'number_likes' => $currentNews->getLikesCount(),
                'number_dislikes' => $currentNews->getDislikesCount(),
                'own_reaction' => $existingInteraction?->isLike()
            ];
        }

        return $this->render('home/index.html.twig', [
            'news_data' => $newsData,
            'last_animes' => $animeRepository->findBy([], ['id' => 'DESC'], 6),
            'month_favorite' => $animeRepository->findOneBy(['isFavorite' => 1]),
            'last_tomes' => $tomeMangaRepository->findBy([], ['createdAt' => 'DESC'], 6),
            'last_articles_anime' => $articlesAnimeRepository->findBy([], ['createdAt' => 'DESC'], 4)
        ]);
    }
}