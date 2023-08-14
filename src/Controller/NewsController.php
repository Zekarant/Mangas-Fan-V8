<?php

namespace App\Controller;

use App\Entity\Images;
use App\Entity\News;
use App\Entity\Comments;
use App\Form\Type\CommentType;
use App\Form\Type\NewsType;
use App\Repository\NewsRepository;
use App\Service\WebhookDiscordService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\String\Slugger\SluggerInterface;

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


}
