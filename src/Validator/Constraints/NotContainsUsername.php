<?php 

namespace App\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

class NotContainsUsername extends Constraint
{
    public $message = 'Le mot de passe ne peut pas contenir votre nom d\'utilisateur.';
}