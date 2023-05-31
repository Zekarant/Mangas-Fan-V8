<?php

namespace App\Controller;

use App\Entity\Comments;
use App\Repository\CommentsRepository;
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
    public function add(Request $request, NewsRepository $newsRepository, UserRepository $userRepository, EntityManagerInterface $em, CommentsRepository $commentsRepository): Response
    {
        $commentData = $request->request->all('comment');

        if (!$this->isCsrfTokenValid('comments-add', $commentData['_token'])) {
            return $this->json([
                'error' => 'Le token CSRF est invalide.',
            ], RESPONSE::HTTP_BAD_REQUEST);
        }

        $news = $newsRepository->findOneBy(['id' => $commentData['news']]);
        if (!$news) {
            return $this->json([
                'error' => 'La news n\'existe pas.',
            ], Response::HTTP_BAD_REQUEST);
        }

        $user = $this->getUser();
        if (!$user) {
            return $this->json([
                'code' => 'L\'utilisateur n\'est pas connecté !',
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
