<?php

namespace Tests\Feature;

use App\Models\PetsModel;
use Tests\TestCase;
use App\Models\PetTypeModel;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ListPetsTest extends TestCase
{
    use RefreshDatabase;

    public function test_list_pets()
    {
        $this->withoutExceptionHandling();

        // Crear datos de prueba
        PetTypeModel::factory(3)->create();
        $pets = PetsModel::factory(3)->create();
        // Consumir la ruta
        $response = $this->getJson('/pets');
        // Asegurarnos de que todo esta bien en esa ruta
        $response->assertOk();
        // Revisar que tengamos los registros creados
        $this->assertCount(3, PetsModel::all());
        // Crear la vista
        $response->assertViewIs('pets.index');
        // Enviar datos a la vista
        $response->assertViewHas('pets',PetsModel::with('pet_type')->get());
        $response->assertViewHas('petType', PetTypeModel::all());
    }
}
