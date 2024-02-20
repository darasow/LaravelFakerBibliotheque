<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\EmpruntController;
use App\Http\Controllers\LivreController;
use App\Http\Controllers\Admin\AuthorController as AdminAuthor;
use App\Http\Controllers\Admin\ClientController as AdminClient;
use App\Http\Controllers\Admin\LivreController as AdminLivre;
use App\Http\Controllers\Admin\EmpruntCotroller as AdminEmprunt;
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


Route::prefix('admin')->middleware('auth')->name('admin.')->group(function(){

    Route::resource("author", AdminAuthor::class);
    Route::resource("client", AdminClient::class);
    Route::resource("livre", AdminLivre::class);
    Route::resource("emprunt", AdminEmprunt::class);
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
