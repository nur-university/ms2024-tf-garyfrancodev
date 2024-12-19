<?php

namespace App\Domain\Aggregates;

use App\Domain\Events\PatientCreated;
use App\Domain\ValueObjects\DniVO;
use App\Domain\ValueObjects\DobVO;
use App\Domain\ValueObjects\EmailVO;
use App\Domain\ValueObjects\FullNameVO;
use App\Domain\ValueObjects\GenderVO;
use App\Shared\AggregateRoot;

class Patient extends AggregateRoot
{
    private DobVO $dobVO;
    private EmailVO $emailVO;
    private FullNameVO $fullNameVO;
    private GenderVO $genderVO;
    private DniVO $dniVO;
    private string $phone;
    private string $userId;

    /**
     * @param DobVO $dobVO
     * @param EmailVO $emailVO
     * @param FullNameVO $fullNameVO
     * @param GenderVO $genderVO
     * @param DniVO $dniVO
     * @param string $phone
     * @param string $userId
     * @param ?string $id
     */
    public function __construct(DobVO $dobVO, EmailVO $emailVO, FullNameVO $fullNameVO, GenderVO $genderVO, DniVO $dniVO, string $phone, string $userId, ?string $id)
    {
        parent::__construct($id);
        $this->fullNameVO = $fullNameVO;
        $this->genderVO = $genderVO;
        $this->emailVO = $emailVO;
        $this->userId = $userId;
        $this->dniVO = $dniVO;
        $this->phone = $phone;
        $this->dobVO = $dobVO;
        $this->domainEvents[] = new PatientCreated($emailVO->getEmail());
    }

    public function updateFullName(FullNameVO $fullNameVO): void
    {
        $this->fullNameVO = $fullNameVO;
    }

    public function getDob(): DobVO
    {
        return $this->dobVO;
    }

    public function getEmail(): EmailVO
    {
        return $this->emailVO;
    }

    public function getFullName(): FullNameVO
    {
        return $this->fullNameVO;
    }

    public function getGender(): GenderVO
    {
        return $this->genderVO;
    }

    public function getDni(): DniVO
    {
        return $this->dniVO;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function getUserId(): string
    {
        return $this->userId;
    }
}
