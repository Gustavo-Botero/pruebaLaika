<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\PetsModel;
use App\Models\PetTypeModel;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DeletePetsTest extends TestCase
{
    use RefreshDatabase;

    public function test_delete_pets()
    {
        // Metodo para que me muestre las excepciones
        $this->withoutExceptionHandling();
        // Datos de prueba
        PetTypeModel::factory(3)->create();
        $pets = PetsModel::factory()->create();
        // probando el endpoint
        $response = $this->withHeader('apiKeyLaika', 'asdf92rsdf')->deleteJson('/pets/' . $pets->id);
        // Nos aseguramos de que todo marcha bien
        $response->assertOk();
        // Revisamos que se haya eliminado el registro de la tabla pet_type
        $this->assertCount(0, PetsModel::all());
        // Comparamos la respuesta
        $response->assertExactJson([
            'alert' => true,
            'icon' => 'info',
            'title' => 'Mascota eliminada correctamente.',
            'limpForm' => 'pets'
        ]);
    }
}
