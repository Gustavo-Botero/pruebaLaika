<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class UseCaseServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\UseCases\Contracts\Modulos\PetType\CreatePetTypeInterface',
            'App\UseCases\Modulos\PetType\CreatePetTypeUseCase'
        );

        $this->app->bind(
            'App\UseCases\Contracts\Modulos\PetType\UpdatePetTypeInterface',
            'App\UseCases\Modulos\PetType\UpdatePetTypeUseCase'
        );

        $this->app->bind(
            'App\UseCases\Contracts\Modulos\PetType\DeletePetTypeInterface',
            'App\UseCases\Modulos\PetType\DeletePetTypeUseCase'
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
