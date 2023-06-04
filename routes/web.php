<?php

use App\Http\Controllers\CasaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pages;

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

Route::get('/', [CasaController::class, "inicialview"]);
Route::get('/filtrar', [CasaController::class, 'inicialview'])->name('filtro');
Route::get('/adiciona', [CasaController::class, "add"]);
Route::post('/adiciona', [CasaController::class, "addcasa"]);
Route::get('/modifica/{codigo}', [CasaController::class, "mod"]);
Route::post('/modifica/{codigo}', [CasaController::class, "modcasa"]);
Route::get('deletar/{codigo}',[CasaController::class, "deletcasa"]);

