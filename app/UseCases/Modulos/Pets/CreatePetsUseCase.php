<?php

namespace App\UseCases\Modulos\Pets;

use Illuminate\Http\Request;
use App\Repositories\Contracts\Modulos\Pets\PetsRepositoryInterface;
use App\UseCases\Contracts\Modulos\Pets\CreatePetsInterface;

class CreatePetsUseCase implements CreatePetsInterface
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
     * Función para crear un registro en la tabla pets
     *
     * @param Request $request
     * @return array
     */
    public function handle(Request $request): array
    {
        $pets = $this->petsRepository->create($request);

        return [
            'alert' => true,
            'icon' => 'success',
            'title' => 'Mascota guardada',
            'limpForm' => 'pets',
            'data' => [
                'id' => $pets->id,
                'name' => $pets->name,
                'age' => $pets->age,
                'race' => $pets->race,
                'description' => $pets->description,
                'pet_type_id' => $pets->pet_type_id
            ]
        ];
    }
}
