<?php

namespace App\Entity\Enums;

enum ReactionCodeEnum: string
{
    case REACTION_SWITCHED = 'reaction-switched';
    case REACTION_REMOVED = 'reaction-removed';
    case REACTION_ADDED = 'reaction-added';
}