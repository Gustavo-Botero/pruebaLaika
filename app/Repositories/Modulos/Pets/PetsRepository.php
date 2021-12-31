<?php

namespace App\Repositories\Modulos\Pets;

use App\Models\PetsModel;
use App\Repositories\Contracts\Modulos\Pets\PetsRepositoryInterface;

class PetsRepository implements PetsRepositoryInterface
{

    /**
     * Implementación de PetsModel
     *
     * @var PetsModel
     */
    protected $pets;

    /**
     * Inyección de dependencias
     *
     * @param PetsModel $pets
     */
    public function __construct(
        PetsModel $pets
    ) {
        $this->pets = $pets;
    }

    /**
     * Función para consultar un registro de la tabla pets
     *
     * @param integer $id
     * @return PetsModel
     */
    public function find(int $id): PetsModel
    {
        return $this->pets->find($id);
    }
}
