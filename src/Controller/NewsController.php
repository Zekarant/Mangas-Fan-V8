<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\News;
use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NewsController extends AbstractController
{
    #[Route('/news/{slug}', name: 'news_show')]
    public function show(?News $news): Response
    {
        if(!$news){
            return $this->redirectToRoute('app_home');
        }
        return $this->render('news/show.html.twig', [
            'news' => $news,
            'categories' => $news->getCategories(),
        ]);
    }
}
