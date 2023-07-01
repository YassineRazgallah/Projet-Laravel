<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CandidatController;
use App\Http\Controllers\ElecteurController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/liste/candidat', [CandidatController::class, 'liste'])->name('liste.candidat');;
Route::post('/enregistrer/candidat', [CandidatController::class, 'store'])->name('store.candidat');
Route::get('/supprimer-candidat/{id}', [CandidatController::class, 'destroy'])->name('delete-candidat');
Route::post('/modifier/candidat/{id}', [CandidatController::class, 'update'])->name('update.candidat');




Route::get('/liste/electeur', [ElecteurController::class, 'liste'])->name('liste.electeur');;
Route::post('/enregistrer/electeur', [ElecteurController::class, 'store'])->name('store.electeur');
Route::get('/supprimer-electeur/{id}', [ElecteurController::class, 'destroy'])->name('delete-electeur');
Route::post('/modifier/electeur/{id}', [ElecteurController::class, 'update'])->name('update.electeur');
