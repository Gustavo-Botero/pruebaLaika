<?php

namespace App\UseCases\Modulos\PetType;

use App\Repositories\Contracts\Modulos\PetType\PetTypeRepositoryInterface;
use App\UseCases\Contracts\Modulos\PetType\DeletePetTypeInterface;

class DeletePetTypeUseCase implements DeletePetTypeInterface
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
     * Función para eliminar un registro de la tabla pet_type
     *
     * @param integer $id
     * @return array
     */
    public function handle(int $id): array
    {
        $this->petTypeRepository->delete($id);

        return [
            'alert' => true,
            'icon' => 'primary',
            'title' => 'Tipo de mascota se elimino correctamente',
            'limpForm' => 'petType'
        ];
    }
}
