<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\PetTypeModel;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PetTypeTest extends TestCase
{
    use RefreshDatabase;

    public function test_list_of_pet_type_can_be_retrieved()
    {
        // Metodo para que me muestre las excepciones
        $this->withoutExceptionHandling();
        // Datos de prueba
        PetTypeModel::factory(3)->create();
        // probando el endpoint
        $response = $this->get('/petType');
        // Nos aseguramos de que todo marcha bien
        $response->assertOk();
        // Obtenemos todos los datos de la tabla
        $petType = PetTypeModel::all();
        // Nos aseguramos que tengamos una vista creada
        $response->assertViewIs('petType.index');
        // Nos aseguramos de que estemos pasando la variable a la vista
        $response->assertViewHas('petType', $petType);
    }

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
        // Revisamos de que tengamos al menos un registro en la tabla
        $this->assertCount(1, PetTypeModel::all());
        // Consultamos el primer registro porque solo guardamos uno
        $post = PetTypeModel::first();
        // Comparamos si es lo que guardamos
        $this->assertEquals($post->name, 'Gato');
    }
}
