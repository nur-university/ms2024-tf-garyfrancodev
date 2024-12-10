<?php

namespace App\Domain\ValueObjects;

class FullName
{
    private string $firstName;
    private string $lastName;

    public function __construct(string $firstName, string $lastName)
    {
        if (empty($firstName) || empty($lastName)) {
            throw new \InvalidArgumentException("First and last name cannot be empty.");
        }

        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    public function __toString(): string
    {
        return "{$this->firstName} {$this->lastName}";
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }
}
