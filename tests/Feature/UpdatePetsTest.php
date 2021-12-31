<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\PetsModel;
use App\Models\PetTypeModel;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UpdatePetsTest extends TestCase
{
    use RefreshDatabase;

    public function test_update_pets()
    {
        // Metodo para que me muestre las excepciones
        $this->withoutExceptionHandling();
        // Datos de prueba
        $petType = PetTypeModel::factory(3)->create();
        $pets = PetsModel::factory()->create();
        // probando el endpoint
        $response = $this->putJson('/pets/' . $pets->id, [
            'name' => 'Pascal',
            'age' => 13,
            'race' => 'Criollo',
            'description' => 'Descripción del animal',
            'pet_type_id' => $petType[0]['id']
        ]);
        // Nos aseguramos de que todo marcha bien
        $response->assertOk();
        // Revisamos de que tenga por lo menos un dato en la tabla pet_type
        $this->assertCount(1, PetsModel::all());
        // refrescamos los datos
        $pets = $pets->fresh();
        // Comparamos que si lo haya actualizado
        $response->assertExactJson([
            'alert' => true,
            'icon' => 'success',
            'title' => 'Mascota actualizada',
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
