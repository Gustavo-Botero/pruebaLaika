<?php

namespace App\Repositories\Modulos\PetType;

use App\Models\PetTypeModel;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use App\Repositories\Contracts\Modulos\PetType\PetTypeRepositoryInterface;

class PetTypeRepository implements PetTypeRepositoryInterface
{
    /**
     * Implementación PetTypeModel
     *
     * @var PetTypeModel
     */
    protected $petType;

    /**
     * Inyección de dependencias
     *
     * @param PetTypeModel $petType
     */
    public function __construct(PetTypeModel $petType)
    {
        $this->petType = $petType;
    }

    /**
     * Función para obtener todos los registros de la tabla pet_type
     *
     * @return Collection
     */
    public function all(): Collection
    {
        return $this->petType->all();
    }

    /**
     * Función para crear un pet_type
     *
     * @param array $request
     * @return integer
     */
    public function create(array $request): int
    {
        // Creamos un objeto
        $petType = new $this->petType;
        $petType->name = $request['name'];
        $petType->save();

        return $petType->id;
    }

    /**
     * Función para obtener el registro por id
     *
     * @param integer $id
     * @return PetTypeModel
     */
    public function find(int $id): PetTypeModel
    {
        return $this->petType->find($id);
    }

    /**
     * Función para actualizar un registro de la tabla pet_type
     *
     * @param Request $request
     * @param integer $id
     * @return integer
     */
    public function update(Request $request, int $id): int
    {
        $petType = $this->find($id);
        $petType->name = $request->name;
        $petType->save();

        return $petType->id;
    }
}
