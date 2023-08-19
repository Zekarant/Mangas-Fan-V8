<?php

namespace App\Controller;

use App\Entity\Images;
use App\Entity\Images;
use App\Entity\News;
use App\Entity\Comments;
use App\Entity\NewsLike;
use App\Entity\NewsDislike;
use App\Form\Type\CommentType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
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


    #[Route('/news/{id}/like', name: 'app_news_like')]
    public function like(News $news, EntityManagerInterface $em): JsonResponse
    {
        $user = $this->getUser();
        $existingDislike = $em->getRepository(NewsDislike::class)->findOneBy(['news' => $news, 'user' => $user]);

        if ($existingDislike) {
            $em->remove($existingDislike);
        }

        $response = $this->toggleReaction($news, $user, 'like', $em);
        return new JsonResponse($response);
    }

    #[Route('/news/{id}/dislike', name: 'app_news_dislike')]
    public function dislike(News $news, EntityManagerInterface $em): JsonResponse
    {
        $user = $this->getUser();
        $existingLike = $em->getRepository(NewsLike::class)->findOneBy(['news' => $news, 'user' => $user]);

        if ($existingLike) {
            $em->remove($existingLike);
        }

        $response = $this->toggleReaction($news, $user, 'dislike', $em);
        return new JsonResponse($response);
    }

    private function toggleReaction(News $news, $user, $reactionType, EntityManagerInterface $em): array
    {
        $repository = $reactionType === 'like' ? NewsLike::class : NewsDislike::class;
        $existingReaction = $em->getRepository($repository)->findOneBy(['news' => $news, 'user' => $user]);

        if ($existingReaction) {
            $em->remove($existingReaction);
            $em->flush();
            $message = ucfirst($reactionType) . ' retiré avec succès.';
        } else {
            $reactionClass = $reactionType === 'like' ? NewsLike::class : NewsDislike::class;
            $reaction = new $reactionClass();
            $reaction->setNews($news);
            $reaction->setUser($user);
            $em->persist($reaction);
            $em->flush();
            $message = ucfirst($reactionType) . ' ajouté avec succès.';
        }

        return [
            'message' => $message,
            'likes' => $news->getLikes()->count(),
            'dislikes' => $news->getDislikes()->count(),
        ];
    }
}
