<?php 
// src/Security/CommentVoter.php
namespace App\Security;

use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;

class CommentVoter extends Voter
{
    protected function supports(string $attribute, $subject): bool
    {
        // Vérifiez si l'attribut est valide, par exemple, "COMMENT".
        return $attribute === 'COMMENT';
    }

    protected function voteOnAttribute(string $attribute, $subject, TokenInterface $token): bool
    {
        $user = $token->getUser();

        // Votre logique pour décider si l'utilisateur a accès à commenter une news.
        // Par exemple, si l'utilisateur a le rôle ROLE_USER, il a accès.
        if ($attribute === 'COMMENT' && in_array('ROLE_USER', $user->getRoles())) {
            return true;
        }

        // Si l'utilisateur a le rôle ROLE_BANNED, il n'a pas accès.
        if ($attribute === 'COMMENT' && in_array('ROLE_BANNED', $user->getRoles())) {
            return false;
        }

        // Vous pouvez ajouter d'autres conditions pour gérer d'autres rôles.

        return false;
    }
}
