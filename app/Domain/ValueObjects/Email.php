<?php

namespace App\Domain\ValueObjects;

use App\Domain\Exceptions\EmailAddressException;
use App\Domain\Rules\EmailAddressRule;
use App\Shared\BusinessRuleValidationException;
use App\Shared\ValueObject;
use App\Domain\Rules\StringNotNullOrEmptyRule;
use App\Domain\Exceptions\StringNotNullOrEmptyException;

class Email extends ValueObject
{
    private string $email;

    /**
     * @throws BusinessRuleValidationException
     */
    public function __construct(string $email)
    {
        $this->checkRule(new StringNotNullOrEmptyException(new StringNotNullOrEmptyRule($email)));
        $this->checkRule(new EmailAddressException(new EmailAddressRule($email)));

        $this->email = $email;
    }

    public function __toString(): string
    {
        return $this->email;
    }

    public function getEmail(): string
    {
        return $this->email;
    }
}