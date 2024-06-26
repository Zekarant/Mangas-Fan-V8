<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Repository\CommentRepository;
use App\Repository\NewsRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CommentsController extends AbstractController
{
    #[Route('/ajax/comments', name: 'comments_add')]
    public function add(Request $request, NewsRepository $newsRepository, UserRepository $userRepository, EntityManagerInterface $em, CommentRepository $commentsRepository): Response
    {
        $commentData = $request->request->all('comment');

        if (!$this->isCsrfTokenValid('comments-add', $commentData['_token'])) {
            return $this->json([
                'code' => 'INVALID_CSRF_TOKEN'
            ], RESPONSE::HTTP_BAD_REQUEST);
        }

        $news = $newsRepository->find($commentData['news']);
        if (!$news) {
            return $this->json([
                'code' => 'NEWS_NOT_FOUND'
            ], Response::HTTP_BAD_REQUEST);
        }

        $user = $this->getUser();
        if (!$user){
            return $this->json([
                'code' => 'USER_NOT_REGISTERED'
            ], Response::HTTP_BAD_REQUEST);
        }

        $comment = new Comment($news);
        $comment->setContent($commentData['content']);
        $comment->setUser($user);
        $comment->setCreatedAt(new \DateTime());
        $em->persist($comment);
        $em->flush();

        $html = $this->renderView('comments/index.html.twig', [
            'comment' => $comment
        ]);

        return $this->json([
            'message' => $html,
            'numberOfComments' => $commentsRepository->count(['news' => $news])
        ]);
    }
}
