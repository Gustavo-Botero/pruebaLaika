<?php

namespace App\UseCases\Modulos\PetType;

use Illuminate\Http\Request;
use App\UseCases\Contracts\Modulos\PetType\UpdatePetTypeInterface;
use App\Repositories\Contracts\Modulos\PetType\PetTypeRepositoryInterface;

class UpdatePetTypeUseCase implements UpdatePetTypeInterface
{

    /**
     * Implementación PetTypeRepositoryInterface
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
     * Función para actualizar un registro de la tabla pet_type
     *
     * @param Request $request
     * @param integer $id
     * @return array
     */
    public function handle(Request $request, int $id): array
    {
        $petType = $this->petTypeRepository->update($request, $id);

        return [
            'alert' => true,
            'icon' => 'success',
            'title' => 'Tipo de mascota actualizado',
            'limpForm' => 'petType'
        ];
    }
}
