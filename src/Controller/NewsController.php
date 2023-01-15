<?php

namespace App\Controller;

use App\Entity\News;
use App\Entity\User;
use App\Entity\Comments;
use App\Form\Type\CommentType;
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
            'news' => $newsRepository->findBy(array(), array('id' => 'DESC'), 15)
        ]);
    }
}
