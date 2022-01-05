<?php

namespace Database\Seeders;

use App\Models\PetTypeModel;
use Illuminate\Database\Seeder;

class PetTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fPetType = database_path('json/petType.json');
        $jPetType = file_get_contents($fPetType);
        
        foreach (json_decode($jPetType) as $row) {
            PetTypeModel::create([
                'name' => $row->name
            ]);
        }
    }
}
