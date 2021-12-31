<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PetsModel extends Model
{
    use HasFactory;

    protected $table = 'pets';

    protected $fillable = [
        'name',
        'age',
        'race',
        'description',
        'pet_type_id',
    ];
}
