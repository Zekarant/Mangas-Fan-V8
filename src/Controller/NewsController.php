<?php

namespace App\Controller;

use App\Entity\Enums\ReactionCodeEnum;
use App\Entity\Enums\ReactionEnum;
use App\Entity\News;
use App\Entity\Comments;
use App\Entity\NewsLike;
use App\Entity\User;
use App\Form\Type\CommentType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Utils\RoleLabelConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Attribute\IsGranted;


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

        $existingInteraction = $news->getOwnReaction($this->getUser());
        $author = $news->getAuthor();
        $rawRoles = $author->getRoles();
        $roleLabels = array_map([RoleLabelConverter::class, 'convertToLabel'], $rawRoles);

        return $this->render('news/news_page.html.twig', [
            'roles' => $roleLabels,
            'news' => $news,
            'number_likes' => $news->getLikesCount(),
            'number_dislikes' => $news->getDislikesCount(),
            'own_reaction' => $existingInteraction?->isLike(),
            'comment_form' => $commentForm
        ]);
    }

    #[Route('/news/{id}/reaction/{reaction}', name: 'app_news_reaction', requirements: ['reaction' => 'like|dislike'])]
    #[IsGranted("ROLE_USER")]
    public function react(News $news, ReactionEnum $reaction, EntityManagerInterface $em): JsonResponse
    {
        $user = $this->getUser();

        $existingInteraction = $news->getOwnReaction($user);

        if ($existingInteraction) {
            if ($reaction->databaseValue() !== $existingInteraction->isLike()) {
                $existingInteraction->setIsLike(!$existingInteraction->isLike());
                $message = ReactionCodeEnum::REACTION_SWITCHED;
            } else {
                $em->remove($existingInteraction);
                $message = ReactionCodeEnum::REACTION_REMOVED;
            }
        } else {
            $interaction = new NewsLike();
            $interaction->setUser($user);
            $interaction->setIsLike($reaction === ReactionEnum::LIKE);

            $news->addLike($interaction);

            $em->persist($interaction);

            $message = ReactionCodeEnum::REACTION_ADDED;
        }

        $em->flush();

        return new JsonResponse([
            'message' => $message,
            'likes' => $news->getLikesCount(),
            'dislikes' => $news->getDislikesCount()
        ]);
    }
}