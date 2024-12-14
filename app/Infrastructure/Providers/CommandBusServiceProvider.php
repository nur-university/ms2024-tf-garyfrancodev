<?php

namespace App\Infrastructure\Providers;

use App\Application\UseCases\Appointment\Command\CreateAppointmentCommand;
use App\Application\UseCases\Appointment\Command\CreateAppointmentCommandHandler;
use App\Application\UseCases\Appointment\Queries\GetAppointmentsByNutritionistIdQuery;
use App\Application\UseCases\Appointment\Queries\GetAppointmentsByNutritionistIdQueryHandler;
use App\Application\UseCases\ClinicalResource\CreateClinicalResource;
use App\Application\UseCases\ClinicalResource\CreateClinicalResourceHandler;
use App\Infrastructure\Core\CommandBus;
use App\Infrastructure\Repositories\Appointment\AppointmentRepositoryImpl;
use Illuminate\Support\ServiceProvider;

class CommandBusServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(CommandBus::class, function () {
            $commandBus = new CommandBus();
            $commandBus->register(CreateClinicalResource::class, new CreateClinicalResourceHandler());
            $commandBus->register(CreateAppointmentCommand::class, new CreateAppointmentCommandHandler(new AppointmentRepositoryImpl()));

            //queries
            $commandBus->register(GetAppointmentsByNutritionistIdQuery::class, new GetAppointmentsByNutritionistIdQueryHandler(new AppointmentRepositoryImpl()));

            return $commandBus;
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
