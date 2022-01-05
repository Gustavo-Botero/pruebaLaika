<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\PetsModel;
use App\Models\PetTypeModel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

class ShowPetsTest extends TestCase
{
    use RefreshDatabase;

    public function test_show_pets()
    {
        // Metodo para que me muestre las excepciones
        $this->withoutExceptionHandling();
        // Creamos los registros de la tabla pet_type
        PetTypeModel::factory(3)->create();
        // Creamos los registros de la tabla pets
        $pets = PetsModel::factory()->create();
        // probamos el endpoint
        $response = $this->getJson('/pets/' . $pets->id);
        // Nos aseguramos de que todo esta bien
        $response->assertOk();

        $response->assertExactJson([
            'data' => [
                'id' => $pets->id,
                'name' => $pets->name,
                'age' => $pets->age,
                'race' => $pets->race,
                'pet_type_id' => $pets->pet_type_id,
                'description' => $pets->description
            ]
        ]);
    }
}
