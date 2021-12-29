<?php

namespace App\UseCases\Modulos\PetType;

use Illuminate\Http\Request;
use App\UseCases\Contracts\Modulos\PetType\CreatePetTypeInterface;
use App\Repositories\Contracts\Modulos\PetType\PetTypeRepositoryInterface;

class CreatePetTypeUseCase implements CreatePetTypeInterface
{
    /**
     * Implementación de PetTypeRepositoryInterface
     *
     * @var PetTypeRepositoryInterface
     */
    protected $petTypeRepository;

    /**
     * Inyección de dependencias
     *
     * @param PetTypeRepositoryInterface $petTypeRepository
     */
    public function __construct(
        PetTypeRepositoryInterface $petTypeRepository
    ) {
        $this->petTypeRepository = $petTypeRepository;
    }

    /**
     * Función para crear un pet_type
     *
     * @param Request $request
     * @return array
     */
    public function handle(Request $request): array
    {
        $petTypeId = $this->petTypeRepository->create(['name' => $request->name]);

        return [
            'alert' => true,
            'icon' => 'success',
            'title' => 'Tipo de mascota guardado',
            'limpForm' => 'petType'
        ];
    }
}
