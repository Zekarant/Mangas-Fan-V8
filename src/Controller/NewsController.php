<?php

namespace App\Controller;

use App\Entity\News;
use App\Entity\User;
use App\Entity\Comments;
use App\Form\Type\CommentType;
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

        return $this->renderForm('news/news_page.html.twig', [
            'news' => $news,
            'comment_form' => $commentForm,
        ]);
    }
}
