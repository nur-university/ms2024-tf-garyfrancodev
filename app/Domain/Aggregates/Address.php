<?php

namespace App\Domain\Aggregates;

use App\Shared\AggregateRoot;

class Address extends AggregateRoot
{
    private string $patientId;
    private string $address;
    private string $gps;

    /**
     * @param string $patientId
     * @param string $address
     * @param string $gps
     */
    public function __construct(string $patientId, string $address, string $gps, ?string $id)
    {
        parent::__construct($id);
        $this->patientId = $patientId;
        $this->address = $address;
        $this->gps = $gps;
    }

    public function updateAddress($newAddress) {
        $this->address = $newAddress;
    }

}
