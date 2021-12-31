<?php

namespace Tests\Feature;

use App\Models\PetsModel;
use App\Models\PetTypeModel;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreatePetsTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_pets()
    {
        // Metodo para que me muestre las excepciones
        $this->withoutExceptionHandling();
        // Creando los datos necesarios
        $petType = PetTypeModel::factory()->create();
        // probando el endpoint
        $response = $this->postJson('/pets', [
            'name' => 'Pascal',
            'age' => 13,
            'race' => 'Criollo',
            'description' => 'Descripción del animal',
            'pet_type_id' => $petType->id
        ]);
        // Nos aseguramos de que todo marcha bien
        $response->assertOk();
        // Revisamos de que tengamos al menos un registro en la tabla
        $this->assertCount(1, PetsModel::all());
        // Consultamos el primer registro porque solo guardamos uno
        $pets = PetsModel::first();
        // Comparamos si es lo que guardamos
        $response->assertExactJson([
            'alert' => true,
            'icon' => 'success',
            'title' => 'Mascota guardada',
            'limpForm' => 'pets',
            'data' => [
                'id' => $pets->id,
                'name' => $pets->name,
                'age' => $pets->age,
                'race' => $pets->race,
                'description' => $pets->description,
                'pet_type_id' => $pets->pet_type_id
            ]
        ]);
    }
}
