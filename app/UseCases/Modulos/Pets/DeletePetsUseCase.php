<?php

namespace App\UseCases\Modulos\Pets;

use App\UseCases\Contracts\Modulos\Pets\DeletePetsInterface;
use App\Repositories\Contracts\Modulos\Pets\PetsRepositoryInterface;

class DeletePetsUseCase implements DeletePetsInterface
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
     * Función para eliminar un registro de la tabla pets
     *
     * @param integer $id
     * @return array
     */
    public function handle(int $id): array
    {
        $this->petsRepository->delete($id);

        return [
            'alert' => true,
            'icon' => 'primary',
            'title' => 'Mascota eliminada correctamente.',
            'limpForm' => 'pets'
        ];
    }
}
