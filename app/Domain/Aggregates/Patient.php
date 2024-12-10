<?php

namespace App\Domain\Aggregates;

use App\Domain\ValueObjects\Address;
use App\Domain\ValueObjects\Email;
use App\Domain\ValueObjects\FullName;
use App\Domain\ValueObjects\IdentificationNumber;
use App\Shared\AggregateRoot;

class Patient extends AggregateRoot
{
    private string $userId;
    private FullName $fullName;
    private Address $address;
    private Email $email;
    private IdentificationNumber $identificationNumber;


    public function __construct(string $userId, FullName $fullName, Address $address, Email $email, IdentificationNumber $identificationNumber, ?string $id = null)
    {
        parent::__construct($id);
        $this->identificationNumber = $identificationNumber;
        $this->fullName = $fullName;
        $this->address = $address;
        $this->userId = $userId;
        $this->email = $email;
    }

    public function updateFullName(FullName $fullName): void
    {
        $this->fullName = $fullName;
    }
}
