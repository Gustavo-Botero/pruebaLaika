<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetTypeModel extends Model
{
    use HasFactory;

    protected $table = 'pet_type';

    protected $fillable = [
        'name',
    ];
}
