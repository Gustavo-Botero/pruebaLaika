<?php

namespace App\UseCases\Contracts\Modulos\Pets;

use App\Http\Requests\PetsStoreRequest;

interface CreatePetsInterface
{
    /**
     * Función para crear un registro en pets
     *
     * @param PetsStoreRequest $request
     * @return array
     */
    public function handle(PetsStoreRequest $request): array;
}