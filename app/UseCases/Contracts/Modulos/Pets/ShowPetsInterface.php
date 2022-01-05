<?php

namespace App\UseCases\Contracts\Modulos\Pets;

interface ShowPetsInterface
{
    /**
     * Función para consultar un registro por id en la tabla pets
     *
     * @param integer $id
     * @return array
     */
    public function handle(int $id): array;
}