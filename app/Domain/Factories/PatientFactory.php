<?php

namespace App\Domain\Factories;

use App\Domain\Aggregates\Patient;
use App\Domain\ValueObjects\DniVO;
use App\Domain\ValueObjects\DobVO;
use App\Domain\ValueObjects\EmailVO;
use App\Domain\ValueObjects\FullNameVO;
use App\Domain\ValueObjects\GenderVO;
use Carbon\Carbon;

class PatientFactory
{
    public static function create($data): Patient
    {
        $userId = $data['user_id'];
        $firstName = $data['full_name']['first_name'];
        $lastName = $data['full_name']['last_name'];
        $fullNameVO = new FullNameVO($firstName, $lastName);
        $email = $data['email'];
        $emailVO = new EmailVO($email);
        $dni = $data['dni'];
        $dniVO = new DniVO($dni);
        $dobVO = new DobVO(Carbon::create($data['dob']));
        $gender = $data['gender'];
        $genderVO = new GenderVO($gender);
        $phone = $data['phone'];

        return new Patient($dobVO, $emailVO, $fullNameVO, $genderVO, $dniVO, $phone, $userId, null);
    }
}
