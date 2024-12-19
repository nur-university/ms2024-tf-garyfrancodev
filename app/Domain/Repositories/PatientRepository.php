<?php

namespace App\Domain\Repositories;

use App\Shared\Repository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface PatientRepository extends Repository
{
    public function createPatientAddress($entity): Model;
    public function getAllPatients(): Collection;
}
