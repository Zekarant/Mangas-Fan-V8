<?php

namespace App\Controller;

use App\Entity\Comments;
use App\Repository\NewsRepository;
use App\Repository\UserRepository;
use App\Repository\CommentsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

class CommentsController extends AbstractController
{
    #[Route('/ajax/comments', name: 'comments_add')]
    public function add(AuthorizationCheckerInterface $authorizationChecker, Request $request, NewsRepository $newsRepository, UserRepository $userRepository, EntityManagerInterface $em, CommentsRepository $commentsRepository): Response
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
        if ($authorizationChecker->isGranted('COMMENT', $news)) {
            $user = $this->getUser();
            if (!$user) {
                return $this->json([
                    'code' => 'USER_NOT_REGISTERED',
                ], Response::HTTP_BAD_REQUEST);
            }

            $comment = new Comments($news);
            $comment->setContent($commentData['content']);
            $comment->setUser($user);
            $comment->setCreatedAt(new \DateTime());
            $em->persist($comment);
            $em->flush();

            $html = $this->renderView('comments/index.html.twig', [
                'comment' => $comment,
            ]);

            return $this->json([
                'message' => $html,
                'numberOfComments' => $commentsRepository->count(['news' => $news]),
            ]);
        }
    }
}
