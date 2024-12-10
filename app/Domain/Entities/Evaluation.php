<?php

namespace App\Domain\Entities;

use App\Shared\Entity;
use Carbon\Carbon;

class Evaluation extends Entity
{
    private string $nutritionistId;
    private string $patientId;
    private Carbon $date;
    private string $weight;
    private string $height;
    private string $imc;
    private string $bloodPressure;
    private string $heartRate;
    private string $observation;

    /**
     * @param string $nutritionistId
     * @param string $patientId
     * @param Carbon $date
     * @param string $weight
     * @param string $height
     * @param string $imc
     * @param string $bloodPressure
     * @param string $heartRate
     * @param string $observation
     */
    public function __construct(string $nutritionistId,string $patientId, Carbon $date, string $weight, string $height, string $imc, string $bloodPressure, string $heartRate, string $observation, ?string $id = null)
    {
        parent::__construct($id);
        $this->nutritionistId = $nutritionistId;
        $this->bloodPressure = $bloodPressure;
        $this->observation = $observation;
        $this->patientId = $patientId;
        $this->heartRate = $heartRate;
        $this->weight = $weight;
        $this->height = $height;
        $this->date = $date;
        $this->imc = $imc;
    }


}
