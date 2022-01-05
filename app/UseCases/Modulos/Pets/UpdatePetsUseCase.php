<?php

namespace App\UseCases\Modulos\Pets;

use App\Http\Requests\PetsStoreRequest;
use App\UseCases\Contracts\Modulos\Pets\UpdatePetsInterface;
use App\Repositories\Contracts\Modulos\Pets\PetsRepositoryInterface;
use App\Repositories\Contracts\Modulos\PetType\PetTypeRepositoryInterface;

class UpdatePetsUseCase implements UpdatePetsInterface
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
     * Función para actualizar un registro en la tabla pets
     *
     * @param PetsStoreRequest $request
     * @param integer $id
     * @return array
     */
    public function handle(PetsStoreRequest $request, int $id): array
    {
        $pets = $this->petsRepository->update($request->data, $id);
        $petType = $this->petTypeRepository->find($pets->pet_type_id);
        
        return [
            'alert' => true,
            'icon' => 'success',
            'title' => 'Mascota actualizada',
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
