<?php 
// src/Security/CommentVoter.php
namespace App\Security;

use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;

class CommentVoter extends Voter
{
    protected function supports(string $attribute, $subject): bool
    {
        return $attribute === 'COMMENT';
    }

    protected function voteOnAttribute(string $attribute, $subject, TokenInterface $token): bool
    {
        $user = $token->getUser();

        if ($attribute === 'COMMENT' && in_array('ROLE_ADMIN', $user->getRoles())) {
            return true;
        }

        if ($attribute === 'COMMENT' && in_array('ROLE_BANNED', $user->getRoles())) {
            return false;
        }

        return false;
    }
}
