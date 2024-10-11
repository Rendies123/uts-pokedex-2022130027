<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PokemonController;
use Illuminate\Support\Facades\Auth;

// Tambahkan use statement ini untuk mengimport controller

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Tambahkan route resource untuk Pokemon
Route::resource(name:'pokemon', controller: PokemonController::class);
// Tambahkan route untuk halaman utama
Route::get('/', PokemonController::class);
