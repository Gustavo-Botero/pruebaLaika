<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UseCases\Contracts\Modulos\PetType\CreatePetTypeInterface;

class PetTypeController extends Controller
{
    /**
     * Implementación de CreatePetTypeInterface
     *
     * @var CreatePetTypeInterface
     */
    protected $createPetType;

    /**
     * Inyección de dependencias
     *
     * @param CreatePetTypeInterface $createPetType
     */
    public function __construct(
        CreatePetTypeInterface $createPetType
    ) {
        $this->createPetType = $createPetType;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
}
