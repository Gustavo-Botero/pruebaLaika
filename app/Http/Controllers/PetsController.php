<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\UseCases\Contracts\Modulos\Pets\CreatePetsInterface;
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
     * Implementación de PetsRepositoryInterface
     *
     * @var PetsRepositoryInterface
     */
    protected $petsRepository;

    /**
     * Inyección de dependencias
     *
     * @param CreatePetsInterface $createPets
     * @param PetsRepositoryInterface $petsRepository
     */
    public function __construct(
        CreatePetsInterface $createPets,
        PetsRepositoryInterface $petsRepository
    ) {
        $this->createPets = $createPets;
        $this->petsRepository = $petsRepository;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    
}
