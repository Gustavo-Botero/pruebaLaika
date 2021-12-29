<?php

namespace App\Repositories\Modulos\PetType;

use App\Models\PetTypeModel;
use App\Repositories\Contracts\Modulos\PetType\PetTypeRepositoryInterface;

class PetTypeRepository implements PetTypeRepositoryInterface
{
    protected $petType;

    public function __construct(PetTypeModel $petType)
    {
        $this->petType = $petType;
    }
    
    public function create(array $request)
    {
        $petType = new $this->petType;
        
        $petType->name = $request['name'];

        $petType->save();

        return $petType->id;
    }
}