<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UseCases\Contracts\Modulos\PetType\CreatePetTypeInterface;
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
     * Implementación PetTypeRepositoryInterface
     *
     * @var PetTypeRepositoryInterface
     */
    protected $petTypeRepository;

    /**
     * Inyección de dependencias
     *
     * @param CreatePetTypeInterface $createPetType
     * @param PetTypeRepositoryInterface $petTypeRepository
     */
    public function __construct(
        CreatePetTypeInterface $createPetType,
        PetTypeRepositoryInterface $petTypeRepository
    ) {
        $this->createPetType = $createPetType;
        $this->petTypeRepository = $petTypeRepository;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $petType = $this->petTypeRepository->all();

        return view('petType.index', compact('petType'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Función para crear un pet_type
     *
     * @param Request $request
     * @return array
     */
    public function store(Request $request): array
    {
        return $this->createPetType->handle($request);
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
