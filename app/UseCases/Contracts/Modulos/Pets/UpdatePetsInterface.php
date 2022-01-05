<?php

namespace App\UseCases\Contracts\Modulos\Pets;

use App\Http\Requests\PetsStoreRequest;

interface UpdatePetsInterface
{
    /**
     * Función para actualizar un registro en la tabla pets
     *
     * @param PetsStoreRequest $request
     * @param integer $id
     * @return array
     */
    public function handle(PetsStoreRequest $request, int $id): array;
}