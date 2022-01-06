<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Http\Requests\PetsStoreRequest;
use App\UseCases\Contracts\Modulos\Pets\ShowPetsInterface;
use App\UseCases\Contracts\Modulos\Pets\CreatePetsInterface;
use App\UseCases\Contracts\Modulos\Pets\UpdatePetsInterface;
use App\UseCases\Contracts\Modulos\Pets\DeletePetsInterface;
use App\Repositories\Contracts\Modulos\Pets\PetsRepositoryInterface;
use App\Repositories\Contracts\Modulos\PetType\PetTypeRepositoryInterface;

class PetsController extends Controller
{
    /**
     * Implementación de CreatePetsInterface
     *
     * @var CreatePetsInterface
     */
    protected $createPets;

    /**
     * Implementación de UpdatePetsInterface
     *
     * @var UpdatePetsInterface
     */
    protected $updatePets;

    /**
     * Implementación de DeletePetsInterface
     *
     * @var DeletePetsInterface
     */
    protected $deletePets;

    /**
     * Implementación de ShowPetsInterface
     *
     * @var ShowPetsInterface
     */
    protected $showPets;

    /**
     * Implementación de PetsRepositoryInterface
     *
     * @var PetsRepositoryInterface
     */
    protected $petsRepository;

    /**
     * Implementación de PetTypeRepositoryInterface
     *
     * @var PetTypeRepositoryInterface
     */
    protected $petTypeRepository;

    /**
     * Inyección de dependencias
     *
     * @param CreatePetsInterface $createPets
     * @param UpdatePetsInterface $updatePets
     * @param DeletePetsInterface $deletePets
     * @param ShowPetsInterface $showPets
     * @param PetsRepositoryInterface $petsRepository
     * @param PetTypeRepositoryInterface $petTypeRepository
     */
    public function __construct(
        CreatePetsInterface $createPets,
        UpdatePetsInterface $updatePets,
        DeletePetsInterface $deletePets,
        ShowPetsInterface $showPets,
        PetsRepositoryInterface $petsRepository,
        PetTypeRepositoryInterface $petTypeRepository
    ) {
        $this->createPets = $createPets;
        $this->updatePets = $updatePets;
        $this->deletePets = $deletePets;
        $this->showPets = $showPets;
        $this->petsRepository = $petsRepository;
        $this->petTypeRepository = $petTypeRepository;
    }

    /**
     * Función para eliminar un registro de la tabla pets
     *
     * @param integer $id
     * @return array
     */
    public function destroy(int $id): array
    {
        return $this->deletePets->handle($id);
    }

    /**
     * Función para mostrar todos los registros de la tabla pets
     *
     * @return View
     */
    public function index(): View
    {
        $petType = $this->petTypeRepository->all();
        $pets = $this->petsRepository->all();

        return view('pets.index', compact('pets', 'petType'));
    }

    /**
     * Función para consultar un registro por id en la tabla pets
     *
     * @param integer $id
     * @return array
     */
    public function show(int $id): array
    {   
        return $this->showPets->handle($id);
    }

    /**
     * Función para crear un registro en la tabla pets
     *
     * @param PetsStoreRequest $request
     * @return array
     */
    public function store(PetsStoreRequest $request): array
    {
        return $this->createPets->handle($request);
    }

    /**
     * Función para actualizar un registro en la tabla pets
     *
     * @param PetsStoreRequest $request
     * @param integer $id
     * @return array
     */
    public function update(PetsStoreRequest $request, int $id): array
    {
        return $this->updatePets->handle($request, $id);
    }

    
}
