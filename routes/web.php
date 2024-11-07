<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RickMortyController;
use App\Http\Controllers\RandomUserController;

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

Route::post('/rick', [RickMortyController::class, 'store'])->name('Rick');

Route::post('/ruser', [RandomUserController::class, 'store'])->name('Ruser');