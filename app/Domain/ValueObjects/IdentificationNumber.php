<?php

namespace App\Domain\ValueObjects;

class IdentificationNumber
{
    private string $idNumber;

    public function __construct(string $idNumber)
    {
        if (empty($idNumber)) {
            throw new \InvalidArgumentException("Identification number cannot be empty.");
        }

        $this->idNumber = $idNumber;
    }

    public function __toString(): string
    {
        return $this->idNumber;
    }

    public function getIdNumber(): string
    {
        return $this->idNumber;
    }
}
