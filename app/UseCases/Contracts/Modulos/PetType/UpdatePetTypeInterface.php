<?php

namespace App\UseCases\Contracts\Modulos\PetType;

use Illuminate\Http\Request;

interface UpdatePetTypeInterface
{
    /**
     * Función para actualizar un registro de la tabla pet_type
     *
     * @param Request $request
     * @param integer $id
     * @return array
     */
    public function handle(Request $request, int $id): array;
}