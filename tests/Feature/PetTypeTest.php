<?php

namespace Tests\Feature;

use App\Models\PetTypeModel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PetTypeTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_pet_type_can_be_created()
    {
        // Metodo para que me muestre las excepciones
        $this->withoutExceptionHandling();
        // probando el endpoint
        $response = $this->post('/petType', [
            'name' => 'Gato',
        ]);
        // Nos aseguramos de que todo marcha bien
        $response->assertOk();
        // Revisamos de que tengamos al menos un registro en la DB
        $this->assertCount(1, PetTypeModel::all());
        // Consultamos el primer registro porque solo guardamos uno
        $post = PetTypeModel::first();
        // Comparamos si es lo que guardamos
        $this->assertEquals($post->name, 'Gato');
    }
}
