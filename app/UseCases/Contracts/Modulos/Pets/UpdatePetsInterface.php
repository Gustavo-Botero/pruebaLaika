<?php

namespace App\UseCases\Contracts\Modulos\Pets;

use Illuminate\Http\Request;

interface UpdatePetsInterface
{
    /**
     * Función para actualizar un registro en la tabla pets
     *
     * @param Request $request
     * @param integer $id
     * @return array
     */
    public function handle(Request $request, int $id): array;
}