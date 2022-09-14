<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VagaController;
use App\Http\Controllers\TipoController;
use App\Http\Controllers\ModalidadeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get("vaga-mudar-status/{vaga}", [VagaController::class, "mudarStatusFavorito"]);
Route::get("vaga/favorita", [VagaController::class, "vagasFavoritas"]);
Route::apiResource("vaga", VagaController::class);

Route::get("tipo", [TipoController::class, "index"]);
Route::get("modalidade", [ModalidadeController::class, "index"]);

