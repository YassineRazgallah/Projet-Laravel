<?php

namespace App\HTTP\Controllers;

use Illuminate\Support\Facades\Route;

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
Route::get('/ajouter/candidat', [CandidatController::class, 'index']);
Route::get('/liste/candidat', [CandidatController::class, 'liste'])->name('liste.candidat');;
Route::post('/enregistrer/candidat', [CandidatController::class, 'store'])->name('store.candidat');
Route::get('/supprimer-candidat/{id}', [CandidatController::class, 'destroy'])->name('delete-candidat');
Route::get('/editer-candidat/{id}', [CandidatController::class, 'edit'])->name('edit-candidat');
Route::post('/modifier/candidat/{id}', [CandidatController::class, 'update'])->name('update.candidat');


Route::get('/ajouter/electeur', [ElecteurController::class, 'index']);
Route::get('/liste/electeur', [ElecteurController::class, 'liste'])->name('liste.electeur');;
Route::post('/enregistrer/electeur', [ElecteurController::class, 'store'])->name('store.electeur');
Route::get('/supprimer-electeur/{id}', [ElecteurController::class, 'destroy'])->name('delete-electeur');
Route::get('/editer-electeur/{id}', [ElecteurController::class, 'edit'])->name('edit-electeur');
Route::post('/modifier/electeur/{id}', [ElecteurController::class, 'update'])->name('update.electeur');
