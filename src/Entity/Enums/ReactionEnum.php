<?php

namespace App\Entity\Enums;

enum ReactionEnum: string
{
    case LIKE = 'like';
    case DISLIKE = 'dislike';

    public function databaseValue(): bool
    {
        return match($this) {
            ReactionEnum::LIKE => true,
            ReactionEnum::DISLIKE => false
        };
    }
}

