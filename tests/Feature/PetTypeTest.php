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

        $this->withoutExceptionHandling();

        $response = $this->post('/petType', [
            'name' => 'Gato',
        ]);

        $response->assertOk();
        $this->assertCount(1, PetTypeModel::all());

        $post = PetTypeModel::first();

        $this->assertEquals($post->name, 'Gato');
    }
}
