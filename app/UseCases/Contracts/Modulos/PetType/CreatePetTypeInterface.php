<?php

namespace App\UseCases\Contracts\Modulos\PetType;

use Illuminate\Http\Request;

interface CreatePetTypeInterface
{
    /**
     * Función para crear un pet_type
     *
     * @param Request $request
     * @return array
     */
    public function handle(Request $request): array;
}
