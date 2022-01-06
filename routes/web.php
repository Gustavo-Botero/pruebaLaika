<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetsController;
use App\Http\Controllers\PetTypeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/pets');
});

Route::resource('petType', PetTypeController::class)->except(['create']);

Route::get('/pets', [PetsController::class, 'index'])->name('pets.index');

Route::middleware('apiKeyLaika')->group(function () {
    Route::post('/pets', [PetsController::class, 'store'])->name('pets.store');
    Route::get('/pets/{id}', [PetsController::class, 'show'])->name('pets.show');
    Route::put('/pets/{id}', [PetsController::class, 'update'])->name('pets.update');
    Route::delete('/pets/{id}', [PetsController::class, 'destroy'])->name('pets.destroy');
});


Route::get('/error', function () {
    return [
        'alert' => true,
        'icon' => 'error',
        'title' => 'No tiene la api-key-laika'
    ];
});
