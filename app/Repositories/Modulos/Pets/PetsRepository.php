<?php

namespace App\Repositories\Modulos\Pets;

use App\Models\PetsModel;
use Illuminate\Database\Eloquent\Collection;
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
     * Función para mostrar todos los registros de la tabla pets
     *
     * @return Collection
     */
    public function all(): Collection
    {
        return $this->pets->all();
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
