<?php

namespace App\UseCases\Modulos\Pets;

use App\Http\Requests\PetsStoreRequest;
use App\UseCases\Contracts\Modulos\Pets\UpdatePetsInterface;
use App\Repositories\Contracts\Modulos\Pets\PetsRepositoryInterface;

class UpdatePetsUseCase implements UpdatePetsInterface
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
     * Función para actualizar un registro en la tabla pets
     *
     * @param PetsStoreRequest $request
     * @param integer $id
     * @return array
     */
    public function handle(PetsStoreRequest $request, int $id): array
    {
        $pets = $this->petsRepository->update($request, $id);

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
                'pet_type_id' => $pets->pet_type_id
            ]
        ];
    }
}
