<?php

namespace App\Repositories\Contracts\Modulos\PetType;

use Illuminate\Http\Request;
use App\Models\PetTypeModel;
use Illuminate\Database\Eloquent\Collection;

interface PetTypeRepositoryInterface
{
    /**
     * Función para obtener todos los registros de la tabla pet_type
     *
     * @return Collection
     */
    public function all(): Collection;

    /**
     * Función para crear un pet_type
     *
     * @param array $request
     * @return integer
     */
    public function create(array $request);

    /**
     * Función para obtener el registro por id
     *
     * @param integer $id
     * @return Collection
     */
    public function find(int $id): PetTypeModel;

    /**
     * Función para actualizar un registro de la tabla pet_type
     *
     * @param Request $request
     * @param integer $id
     * @return integer
     */
    public function update(Request $request, int $id): int;
}
