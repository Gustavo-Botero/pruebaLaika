<?php

namespace App\UseCases\Contracts\Modulos\PetType;

interface DeletePetTypeInterface
{
    /**
     * Función para eliminar un registro de la tabla pet_type
     *
     * @param integer $id
     * @return array
     */
    public function handle(int $id): array;
}