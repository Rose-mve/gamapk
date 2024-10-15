<?php

use App\Http\Controllers\fiche_de_paieController;
use App\Http\Controllers\statistiqueController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\employeController;
use App\Http\Controllers\courrierController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//Route Employe
//Route::post('/creeremploye', [employeController::class, 'creerEmploye'])->name('creeremploye');
Route::get('/listeemploye', [employeController::class, 'listeEmployes'])->name('listeemploye');
Route::get('/listeemployeArchive', [employeController::class, 'listeEmployesArchive'])->name('listeEmployesArchive');
Route::get('/employe/{employe}/editer', [employeController::class, 'edite_employe'])->name('edite_employe');
Route::get('/employe/{employe}/recherche', [employeController::class, 'recherche_employe'])->name('recherche_employe');
Route::put('/employe/{employe}/modifier', [employeController::class, 'modifier_employe'])->name('modifier_employe');
Route::put('/employe/{employe}/archiver', [employeController::class, 'archiver_employe'])->name('archiver_employe');
Route::get('/employe/{employe}/genererContrat', [employeController::class, 'genererContrat'])->name('genererContrat_employe');

//Route Fiches de paies
Route::post('/creerFiche_de_paie', [fiche_de_paieController::class, 'creerFiche_de_paie'])->name('creerFiche_de_paie');
Route::get('/listeFiche_de_paie', [fiche_de_paieController::class, 'listeFiche_de_paie'])->name('listeFiche_de_paie');
Route::get('/listeFiche_de_paieArchive', [fiche_de_paieController::class, 'listeFiche_de_paieArchive'])->name('listeFiche_de_paiesArchive');
Route::get('/Fiche_de_paie/{Fiche_de_paie}/editer', [fiche_de_paieController::class, 'edite_Fiche_de_paie'])->name('edite_Fiche_de_paie');
Route::get('/Fiche_de_paie/{matricule}/recherche', [fiche_de_paieController::class, 'recherche_Fiche_de_paie'])->name('recherche_Fiche_de_paie');
Route::put('/Fiche_de_paie/{Fiche_de_paie}/modifier', [fiche_de_paieController::class, 'modifier_Fiche_de_paie'])->name('modifier_Fiche_de_paie');
Route::put('/Fiche_de_paie/{Fiche_de_paie}/archiver', [fiche_de_paieController::class, 'archiver_Fiche_de_paie'])->name('archiver_Fiche_de_paie');

//Route courriers
Route::post('/demande_Abscence_conge', [courrierController::class, 'demande_Abscence_conge'])->name('demande_Abscence_conge');
Route::post('/sanction', [courrierController::class, 'sanction'])->name('sanction');
Route::put('/courrier/{courrier}/accepter', [courrierController::class, 'accepter_demande'])->name('accepter_demande');
Route::put('/courrier/{courrier}/refuser', [courrierController::class, 'refuser_demande'])->name('refuser_demande');
Route::get('/statistiques', [statistiqueController::class, 'statistiques'])->name('statistiques');


//Route Statistiques
