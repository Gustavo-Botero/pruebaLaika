<?php

namespace App\UseCases\Contracts\Modulos\Pets;

interface DeletePetsInterface
{
    /**
     * Función para eliminar un registro de la tabla pets
     *
     * @param integer $id
     * @return array
     */
    public function handle(int $id): array;
}