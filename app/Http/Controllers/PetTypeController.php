<?php

namespace App\Http\Controllers;


use Illuminate\View\View;
use Illuminate\Http\Request;
use App\UseCases\Contracts\Modulos\PetType\CreatePetTypeInterface;
use App\UseCases\Contracts\Modulos\PetType\UpdatePetTypeInterface;
use App\Repositories\Contracts\Modulos\PetType\PetTypeRepositoryInterface;

class PetTypeController extends Controller
{
    /**
     * Implementación de CreatePetTypeInterface
     *
     * @var CreatePetTypeInterface
     */
    protected $createPetType;
    /**
     * Implementación de UpdatePetTypeInterface
     *
     * @var UpdatePetTypeInterface
     */
    protected $updatePetType;

    /**
     * Implementación PetTypeRepositoryInterface
     *
     * @var PetTypeRepositoryInterface
     */
    protected $petTypeRepository;

    /**
     * Inyección de dependencias
     *
     * @param CreatePetTypeInterface $createPetType
     * @param UpdatePetTypeInterface $updatePetType
     * @param PetTypeRepositoryInterface $petTypeRepository
     */
    public function __construct(
        CreatePetTypeInterface $createPetType,
        UpdatePetTypeInterface $updatePetType,
        PetTypeRepositoryInterface $petTypeRepository
    ) {
        $this->createPetType = $createPetType;
        $this->updatePetType = $updatePetType;
        $this->petTypeRepository = $petTypeRepository;
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
     * Función para mostrar los registros
     *
     * @return View
     */
    public function index(): View
    {
        $petType = $this->petTypeRepository->all();

        return view('petType.index', compact('petType'));
    }

    /**
     * Función para consultar y mostrar un registro
     *
     * @param integer $id
     * @return View
     */
    public function show(int $id): View
    {
        $petType = $this->petTypeRepository->find($id);

        return view('petType.show', compact('petType'));
    }

    /**
     * Función para crear un registro en la tabla pet_type
     *
     * @param Request $request
     * @return array
     */
    public function store(Request $request): array
    {
        return $this->createPetType->handle($request);
    }    

    /**
     * Función para actualizar un registro de la tabla pet_type
     *
     * @param Request $request
     * @param integer $id
     * @return array
     */
    public function update(Request $request, int $id): array
    {
        return $this->updatePetType->handle($request, $id);
    }
    
}
