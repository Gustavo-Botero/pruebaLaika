<?php

namespace App\Repositories\Contracts\Modulos\PetType;

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

}