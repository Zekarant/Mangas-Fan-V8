<?php

namespace App\Controller;

use App\Entity\News;
use App\Repository\NewsRepository;
use App\Repository\AnimesRepository;
use App\Repository\TomeMangasRepository;
use App\Repository\ArticlesAnimeRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(NewsRepository $newsRepository, AnimesRepository $animesRepository, TomeMangasRepository $tomeMangasRepository, ArticlesAnimeRepository $articlesAnimeRepository): Response
    {
        var_dump($this->isGranted('ROLE_NEWS'));
        $newsList = $newsRepository->findBy(['visibility' => 1], ['id' => 'DESC'], 3);

        $newsData = [];
        foreach ($newsList as $currentNews) {
            $existingInteraction = $currentNews->getOwnReaction($this->getUser());

            $newsData[] = [
                'news' => $currentNews,
                'number_likes' => $currentNews->getLikesCount(),
                'number_dislikes' => $currentNews->getDislikesCount(),
                'own_reaction' => $existingInteraction ? $existingInteraction->isLike() : null,
            ];
        }

        return $this->render('home/index.html.twig', [
            'news_data' => $newsData,
            'last_animes' => $animesRepository->findBy([], ['id' => 'DESC'], 6),
            'month_favorite' => $animesRepository->findOneBy(['coupCoeur' => 1]),
            'last_mangas' => $tomeMangasRepository->findBy([], ['createdAt' => 'DESC'], 6),
            'last_articles_anime' => $articlesAnimeRepository->findBy([], ['createdAt' => 'DESC'], 4),
        ]);
    }


}