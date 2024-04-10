<?php

namespace App\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class NotContainsUsernameValidator extends ConstraintValidator
{
    public function validate($value, Constraint $constraint): void
    {
        $username = $this->context->getRoot()->get('username')->getData();

        if (stripos($value, $username) !== false) {
            $this->context->buildViolation($constraint->message)
                ->addViolation();
        }
    }
}
