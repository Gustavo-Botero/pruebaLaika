<?php

namespace App\UseCases\Contracts\Modulos\Pets;

use Illuminate\Http\Request;

interface CreatePetsInterface
{
    public function handle(Request $request): array;
}