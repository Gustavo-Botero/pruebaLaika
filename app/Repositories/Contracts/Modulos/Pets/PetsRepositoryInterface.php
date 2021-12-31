<?php

namespace App\Repositories\Contracts\Modulos\Pets;

use App\Models\PetsModel;

interface PetsRepositoryInterface
{
    /**
     * Función para consultar un registro de la tabla pets
     *
     * @param integer $id
     * @return PetsModel
     */
    public function find(int $id): PetsModel;
}