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
     * Función para eliminar un registro de la tabla pets
     *
     * @param integer $id
     * @return boolean
     */
    public function delete(int $id): bool;

    /**
     * Función para consultar un registro de la tabla pets
     *
     * @param integer $id
     * @return PetsModel
     */
    public function find(int $id): PetsModel;

    /**
     * Función para actualizar un registro en la tabla pets
     *
     * @param Request $request
     * @param integer $id
     * @return PetsModel
     */
    public function update(Request $request, int $id): PetsModel;
}