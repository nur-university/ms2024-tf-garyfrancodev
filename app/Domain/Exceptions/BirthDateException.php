<?php

namespace App\Domain\Exceptions;

use App\Shared\BusinessRule;
use App\Shared\BusinessRuleValidationException;

class BirthDateException extends BusinessRuleValidationException
{
    public function __construct(BusinessRule $businessRule)
    {
        parent::__construct($businessRule);
    }
}
