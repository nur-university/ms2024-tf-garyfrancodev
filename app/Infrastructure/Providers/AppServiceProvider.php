<?php

namespace App\Infrastructure\Providers;

use App\Application\EventHandlers\ClinicalResource\NotifyNutritionist;
use App\Application\EventHandlers\ClinicalResource\NotifyNutritionistWhenCreatedAppointment;
use App\Domain\Events\ClinicalResourceAdded;
use App\Domain\Events\CreatedAppointment;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Event::listen(ClinicalResourceAdded::class,NotifyNutritionist::class);
        Event::listen(CreatedAppointment::class,NotifyNutritionistWhenCreatedAppointment::class);
    }
}
