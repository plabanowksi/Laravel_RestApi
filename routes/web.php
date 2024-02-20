<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/uploadImage', [PetController::class, 'showuploadImageView']);
Route::post('/uploadImage', [PetController::class, 'uploadImage']);

Route::get('/addNewPet', [PetController::class, 'showAddNewPetView']);
Route::post('/addNewPet', [PetController::class, 'addNewPet']);

Route::get('/updatePet', [PetController::class, 'showUpdatePetView']);
Route::put('/updatePet', [PetController::class, 'updatePet']); 

Route::get('/findPetsByStatus', [PetController::class, 'findByStatus']);

Route::get('/findPetById', [PetController::class, 'findPetById']);

Route::get('/updatePetWithFormData', [PetController::class, 'updatePetWithFormData']);
Route::put('/updatePetWithFormData', [PetController::class, 'updatePetWithFormData']);

Route::get('/deletePet', [PetController::class, 'deletePet']);
