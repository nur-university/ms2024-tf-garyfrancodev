<?php

namespace App\Application\EventHandlers\ClinicalResource;

use App\Domain\Events\ClinicalResourceAdded;

class NotifyNutritionist
{
    /**
     * Handle the event.
     */
    public function handle(ClinicalResourceAdded $event)
    {
        error_log("Listener ejecutado: NotifyNutritionist");
        return "gary";
    }
}