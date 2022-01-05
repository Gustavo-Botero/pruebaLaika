<?php

namespace App\UseCases\Modulos\Pets;

use App\Http\Requests\PetsStoreRequest;
use App\UseCases\Contracts\Modulos\Pets\CreatePetsInterface;
use App\Repositories\Contracts\Modulos\Pets\PetsRepositoryInterface;
use App\Repositories\Contracts\Modulos\PetType\PetTypeRepositoryInterface;

class CreatePetsUseCase implements CreatePetsInterface
{
    /**
     * Implementación de PetsRepositoryInterface
     *
     * @var PetsRepositoryInterface
     */
    protected $petsRepository;

    protected $petTypeRepository;

    /**
     * Inyección de dependencias
     *
     * @param PetsRepositoryInterface $petsRepository
     */
    public function __construct(
        PetsRepositoryInterface $petsRepository,
        PetTypeRepositoryInterface $petTypeRepository
    ) {
        $this->petsRepository = $petsRepository;
        $this->petTypeRepository = $petTypeRepository;
    }

    /**
     * Función para crear un registro en la tabla pets
     *
     * @param PetsStoreRequest $request
     * @return array
     */
    public function handle(PetsStoreRequest $request): array
    {
        $pets = $this->petsRepository->create($request->data);
        $petType = $this->petTypeRepository->find($pets->pet_type_id);

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
                'pet_type' => $petType->name
            ]
        ];
    }
}
