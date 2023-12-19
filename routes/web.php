<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\EmpruntController;
use App\Http\Controllers\LivreController;
use App\Http\Controllers;

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


Route::get('/',[AuthorController::class, 'index'])->name('authors.liste');
Route::get('/author/{author}',[AuthorController::class, 'show'])->name('authors.show');

Route::get('/clients', [ClientController::class, "index"])->name('clients.liste');
Route::get('/clients/{client}',[ClientController::class, 'show'])->name('clients.show');



Route::get('/livres', [LivreController::class, 'index'])->name('livres.liste');
Route::get('/livres/{livre}',[LivreController::class, 'show'])->name('livres.show');


Route::get('/emprunts',[EmpruntController::class, 'index'])->name('emprunts.liste');
