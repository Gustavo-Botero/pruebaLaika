<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\UseCases\Contracts\Modulos\Pets\CreatePetsInterface;
use App\UseCases\Contracts\Modulos\Pets\UpdatePetsInterface;
use App\UseCases\Contracts\Modulos\Pets\DeletePetsInterface;
use App\Repositories\Contracts\Modulos\Pets\PetsRepositoryInterface;

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
     * Implementación de PetsRepositoryInterface
     *
     * @var PetsRepositoryInterface
     */
    protected $petsRepository;

    /**
     * Inyección de dependencias
     *
     * @param CreatePetsInterface $createPets
     * @param UpdatePetsInterface $updatePets
     * @param DeletePetsInterface $deletePets
     * @param PetsRepositoryInterface $petsRepository
     */
    public function __construct(
        CreatePetsInterface $createPets,
        UpdatePetsInterface $updatePets,
        DeletePetsInterface $deletePets,
        PetsRepositoryInterface $petsRepository
    ) {
        $this->createPets = $createPets;
        $this->updatePets = $updatePets;
        $this->deletePets = $deletePets;
        $this->petsRepository = $petsRepository;
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Función para mostrar todos los registros de la tabla pets
     *
     * @return View
     */
    public function index(): View
    {
        $pets = $this->petsRepository->all();

        return view('pets.index', compact('pets'));
    }

    /**
     * Función para consultar un registro de la tabla pets
     *
     * @param integer $id
     * @return View
     */
    public function show(int $id): View
    {
        $pets = $this->petsRepository->find($id);

        return view('pets.show', compact('pets'));
    }

    /**
     * Función para crear un registro en la tabla pets
     *
     * @param Request $request
     * @return array
     */
    public function store(Request $request): array
    {
        return $this->createPets->handle($request);
    }

    /**
     * Función para actualizar un registro en la tabla pets
     *
     * @param Request $request
     * @param integer $id
     * @return array
     */
    public function update(Request $request, int $id): array
    {
        return $this->updatePets->handle($request, $id);
    }

    
}
