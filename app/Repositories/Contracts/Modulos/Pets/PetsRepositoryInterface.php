<?php

namespace App\Repositories\Contracts\Modulos\Pets;

use App\Models\PetsModel;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;

interface PetsRepositoryInterface
{

    /**
     * Función para mostrar todos los registros de la tabla pets
     *
     * @return Collection
     */
    public function all(): Collection;

    /**
     * Función para crear un pets
     *
     * @param Request $request
     * @return PetsModel
     */
    public function create(Request $request): PetsModel;

    /**
     * Función para consultar un registro de la tabla pets
     *
     * @param integer $id
     * @return PetsModel
     */
    public function find(int $id): PetsModel;
}