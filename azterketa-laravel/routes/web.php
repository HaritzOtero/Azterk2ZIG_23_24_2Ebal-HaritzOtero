<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\YateaController;
use App\Http\Controllers\AlokairuaController;

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

Route::get('/yateak', [YateaController::class, 'index'])->name('yateak.index');
Route::post('/yateak', [YateaController::class, 'store'])->name('yateak.store');
Route::get('/yateak/{id}', [YateaController::class, 'show'])->name('yateak.show');
Route::patch('/yateak/{id}', [YateaController::class, 'update'])->name('yateak.update');
Route::delete('/yateak/{id}', [YateaController::class, 'destroy'])->name('yateak.destroy');

Route::get('/alokairuak', [AlokairuaController::class, 'index'])->name('alokairua.index');
Route::post('/alokairuak', [AlokairuaController::class, 'store'])->name('alokairua.store');
Route::get('/alokairuak/{id}', [AlokairuaController::class, 'show'])->name('alokairua.show');
Route::patch('/alokairuak/{id}', [AlokairuaController::class, 'update'])->name('alokairua.update');
Route::delete('/alokairuak/{id}', [AlokairuaController::class, 'destroy'])->name('alokairua.destroy');