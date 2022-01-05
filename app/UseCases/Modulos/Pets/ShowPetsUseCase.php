<?php

namespace App\UseCases\Modulos\Pets;

use App\Repositories\Contracts\Modulos\Pets\PetsRepositoryInterface;
use App\UseCases\Contracts\Modulos\Pets\ShowPetsInterface;

class ShowPetsUseCase implements ShowPetsInterface
{
    /**
     * Implementación de PetsRepositoryInterface
     *
     * @var PetsRepositoryInterface
     */
    protected $petsRepository;

    /**
     * Inyección de dependencias
     *
     * @param PetsRepositoryInterface $petsRepository
     */
    public function __construct(
        PetsRepositoryInterface $petsRepository
    ) {
        $this->petsRepository = $petsRepository;
    }

    /**
     * Función para consultar un registro por id en la tabla pets
     *
     * @param integer $id
     * @return array
     */
    public function handle(int $id): array
    {
        $pets = $this->petsRepository->find($id);

        return [
            'data' => [
                'id' => $pets->id,
                'name' => $pets->name,
                'age' => $pets->age,
                'race' => $pets->race,
                'pet_type_id' => $pets->pet_type_id,
                'description' => $pets->description
            ]
        ];
    }
}
