<?php

namespace App\Repositories\Modulos\Pets;

use App\Models\PetsModel;
use Illuminate\Http\Request;
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
     * Función para crear un pets
     *
     * @param Request $request
     * @return PetsModel
     */
    public function create(Request $request): PetsModel
    {
        $pets = new $this->pets;
        $pets->name = $request->name;
        $pets->age = $request->age;
        $pets->race = $request->race;
        $pets->description = $request->description;
        $pets->pet_type_id = $request->pet_type_id;
        $pets->save();

        return $pets;

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

    /**
     * Función para actualizar un registro en la tabla pets
     *
     * @param Request $request
     * @param integer $id
     * @return PetsModel
     */
    public function update(Request $request, int $id): PetsModel
    {
        $pets = $this->find($id);
        $pets->name = $request->name;
        $pets->age = $request->age;
        $pets->race = $request->race;
        $pets->description = $request->description;
        $pets->pet_type_id = $request->pet_type_id;

        $pets->update();

        return $pets;
    }
}
