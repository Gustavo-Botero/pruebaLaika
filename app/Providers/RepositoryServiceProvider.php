<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Repositories\Contracts\Modulos\PetType\PetTypeRepositoryInterface',
            'App\Repositories\Modulos\PetType\PetTypeRepository'
        );

        $this->app->bind(
            'App\Repositories\Contracts\Modulos\Pets\PetsRepositoryInterface',
            'App\Repositories\Modulos\Pets\PetsRepository'
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
