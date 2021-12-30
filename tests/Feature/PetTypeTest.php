<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\PetTypeModel;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PetTypeTest extends TestCase
{
    use RefreshDatabase;

    public function test_update_pet_type()
    {
        // Metodo para que me muestre las excepciones
        $this->withoutExceptionHandling();
        // Datos de prueba
        $petType = PetTypeModel::factory()->create();
        // probando el endpoint
        $response = $this->put('/petType/' . $petType->id, [
            'name' => 'gato'
        ]);
        // Nos aseguramos de que todo marcha bien
        $response->assertOk();
        // Revisamos de que tenga por lo menos un dato en la tabla pet_type
        $this->assertCount(1, PetTypeModel::all());
        // refrescamos los datos
        $petType = $petType->fresh();
        // Comparamos que si lo haya actualizado
        $this->assertEquals($petType->name, 'gato');
    }

    public function test_show_pet_type()
    {
        // Metodo para que me muestre las excepciones
        $this->withoutExceptionHandling();
        // Datos de prueba
        $petType = PetTypeModel::factory()->create();
        // probando el endpoint
        $response = $this->get('/petType/'. $petType->id);
        // Nos aseguramos de que todo marcha bien
        $response->assertOk();
        // Obtenemos el primer dato de la tabla
        $petType = PetTypeModel::first();
        // Nos aseguramos que tengamos una vista creada
        $response->assertViewIs('petType.show');
        // Nos aseguramos de que estemos pasando la variable a la vista
        $response->assertViewHas('petType', $petType);
    }

    public function test_list_pet_type()
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

    public function test_create_pet_type()
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
