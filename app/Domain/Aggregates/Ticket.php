<?php

namespace App\Domain\Aggregates;

use App\Shared\AggregateRoot;

class Ticket extends AggregateRoot
{
    private string $patientId;
    private string $type;
    private string $details;
    private string $status;

    /**
     * @param string $patientId
     * @param string $type
     * @param string $details
     * @param string $status
     */
    public function __construct(string $patientId, string $type, string $details, string $status, ?string $id)
    {
        parent::__construct($id);
        $this->patientId = $patientId;
        $this->details = $details;
        $this->status = $status;
        $this->type = $type;
    }

    public function updateStatus($newStatus){
        $this->status = $newStatus;
    }


}
