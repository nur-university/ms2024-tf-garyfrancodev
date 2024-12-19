<?php

namespace App\Domain\Entities;

use App\Shared\Entity;

class DietaryPreference extends Entity
{
    private string $patientId;
    private string $preference;

    /**
     * @param string $patientId
     * @param string $preference
     */
    public function __construct(string $patientId, string $preference, ?string $id)
    {
        parent::__construct($id);
        $this->patientId = $patientId;
        $this->preference = $preference;
    }

    public function updatePreference($newValue)
    {
        $this->preference = $newValue;
    }

}
