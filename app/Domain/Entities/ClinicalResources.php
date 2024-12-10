<?php

namespace App\Domain\Entities;

use App\Shared\Entity;
use Carbon\Carbon;

class ClinicalResources extends Entity
{
    private string $patientId;
    private string $evaluationId;
    private string $nutritionistId;
    private string $typeResource;
    private string $description;
    private string $fileName;
    private string $path;
    private string $mimeType;
    private int $size;
    private Carbon $date;
    private Carbon $clinicalDate;
    private string $state;

    /**
     * @param string $patientId
     * @param string $evaluationId
     * @param string $nutritionistId
     * @param string $typeResource
     * @param string $description
     * @param string $fileName
     * @param string $path
     * @param string $mimeType
     * @param int $size
     * @param Carbon $date
     * @param Carbon $clinicalDate
     * @param string $state
     */
    public function __construct(string $patientId, string $evaluationId, string $nutritionistId, string $typeResource, string $description, string $fileName, string $path, string $mimeType, int $size, Carbon $date, Carbon $clinicalDate, string $state, ?string $id = null)
    {
        parent::__construct($id);
        $this->nutritionistId = $nutritionistId;
        $this->evaluationId = $evaluationId;
        $this->typeResource = $typeResource;
        $this->clinicalDate = $clinicalDate;
        $this->description = $description;
        $this->patientId = $patientId;
        $this->fileName = $fileName;
        $this->mimeType = $mimeType;
        $this->state = $state;
        $this->path = $path;
        $this->size = $size;
        $this->date = $date;
    }


}
