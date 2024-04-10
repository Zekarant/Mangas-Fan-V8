<?php 

namespace App\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class NotContainsUsername extends Constraint
{
    public $message = 'Le mot de passe ne peut pas contenir votre nom d\'utilisateur.';
}