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

        $this->app->bind(
            'App\UseCases\Contracts\Modulos\Pets\CreatePetsInterface',
            'App\UseCases\Modulos\Pets\CreatePetsUseCase'
        );

        $this->app->bind(
            'App\UseCases\Contracts\Modulos\Pets\UpdatePetsInterface',
            'App\UseCases\Modulos\Pets\UpdatePetsUseCase'
        );

        $this->app->bind(
            'App\UseCases\Contracts\Modulos\Pets\DeletePetsInterface',
            'App\UseCases\Modulos\Pets\DeletePetsUseCase'
        );

        $this->app->bind(
            'App\UseCases\Contracts\Modulos\Pets\ShowPetsInterface',
            'App\UseCases\Modulos\Pets\ShowPetsUseCase'
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
