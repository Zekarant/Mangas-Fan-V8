<?php

namespace App\Controller;

use App\Entity\News;
use App\Entity\Comments;
use App\Form\Type\CommentType;
use App\Form\Type\NewsType;
use App\Repository\NewsRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class NewsController extends AbstractController
{
    #[Route('/news/{slug}', name: 'news_show')]
    public function show(?News $news): Response
    {
        if (!$news) {
            return $this->redirectToRoute('app_home');
        }

        $comment = new Comments($news);
        $commentForm = $this->createForm(CommentType::class, $comment);

        return $this->render('news/news_page.html.twig', [
            'news' => $news,
            'comment_form' => $commentForm,
        ]);
    }

    #[Route('/admin/news', name: 'admin_news')]
    public function adminNews(NewsRepository $newsRepository): Response
    {
        return $this->render('news/admin/index.html.twig', [
            'news' => $newsRepository->findBy([], ['id' => 'DESC'], 15),
        ]);
    }

    #[Route('/admin/create', name: 'admin_news_created')]
    public function createNews(): Response
    {
        $news = new News();
        $newForm = $this->createForm(NewsType::class, $news);

        return $this->render('news/admin/create.html.twig', [
            'news_form' => $newForm,
        ]);
    }
}
