<?php

namespace App\Repositories\Modulos\PetType;

use App\Models\PetTypeModel;
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

}