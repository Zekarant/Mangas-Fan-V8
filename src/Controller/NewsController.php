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


    #[Route('/admin/news', name: 'admin_news')]
    public function adminNews(NewsRepository $newsRepository)
    {
        return $this->render('news/admin/index.html.twig', [
            'news' => $newsRepository->findBy(array(), array('id' => 'DESC'), 15)
        ]);
    }

    #[Route('/admin/create', name: 'admin_news_created')]
    public function createNews(Request $request, SluggerInterface $slugger, Security $security, EntityManagerInterface $entityManager, WebhookDiscordService $webhookDiscordService)
    {
        $this->webhookDiscordService = $webhookDiscordService;
        $news = new News();

        $form = $this->createForm(NewsType::class, $news);
        $news->setAuthor($security->getUser());
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $imageFile = $form->get('image')->getData();
            if($imageFile){
                $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$imageFile->guessExtension();

                try {
                    $imageFile->move(
                        $this->getParameter('uploads_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    // Gérer l'exception en conséquence
                }

                $image = new Images();
                $image->setFilename($newFilename);
                $image->setName('Test');
                $image->setAltText('Test encore');
                $entityManager->persist($image);
                // Définissez les autres informations nécessaires pour l'entité Image

                $news->setImage($image);
            }
            $news->setCreatedAt(new \DateTime());
            $entityManager->persist($news);
            $entityManager->flush();
            $this->webhookDiscordService->sendMessageEmbed($news->getTitleNews(), $news->getDescriptionNews(), $news->getSlug(), 123456, true, $newFilename);
            return $this->redirectToRoute('admin_news_created');
        }
        return $this->render('news/admin/create.html.twig', [
            'form' => $form,
        ]);
    }
}
