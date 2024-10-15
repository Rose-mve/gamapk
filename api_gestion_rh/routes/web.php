<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\employeController;
use App\Http\Controllers\WeatherController;
use App\Http\Controllers\statistiqueController;
use App\Http\Controllers\fiche_de_paieController;
use App\Http\Controllers\courrierController;


Route::get('/', function () {
    return view('welcome');
});
//Route Employe
Route::post('/creeremploye', [employeController::class, 'creerEmploye'])->name('creerEmploye');
Route::get('/formulaireAjoutE', [employeController::class, 'formulaireAjoutemploye'])->name('formulaireAjoutemploye');
Route::get('/listeemploye', [employeController::class, 'listeEmployes'])->name('listeemploye');
Route::get('/employe/{id}/editer', [employeController::class, 'edite_employe'])->name('edite_employe');
Route::put('/employe/{employe}/modifier_employe', [employeController::class, 'modifier_employe'])->name('modifier_employe');
Route::get('/employe/{employe}/recherche', [employeController::class, 'recherche'])->name('recherche');
Route::get('/employe/{id}/archiver', [employeController::class, 'archiver_employe'])->name('archiver_employe');
Route::get('/listeemployeArchive', [employeController::class, 'listeEmployesArchive'])->name('listeEmployesArchive');
Route::get('/employe/{employe}/genererContrat', [employeController::class, 'genererContrat'])->name('genererContrat_employe');
Route::get('employes/{id}/exporter-pdf', [employeController::class, 'exporterpdf'])->name('exporterpdf');
Route::get('/consulter/{employe}/consulter', [employeController::class, 'consulterEmployer'])->name('consulterEmployer');

Route::get('/statistiques', [statistiqueController::class, 'statistiques'])->name('statistiques');

//Route Fiches de paies
Route::post('/creerFiche_de_paie', [fiche_de_paieController::class, 'creerFiche_de_paie'])->name('creerFiche_de_paie');
Route::get('/listeFiche_de_paie', [fiche_de_paieController::class, 'listeFiche_de_paie'])->name('listeFiche_de_paie');
Route::get('/listeFiche_de_paieArchive', [fiche_de_paieController::class, 'listeFiche_de_paieArchive'])->name('listeFiche_de_paiesArchive');
Route::get('/Fiche_de_paie/{Fiche_de_paie}/editer', [fiche_de_paieController::class, 'edite_Fiche_de_paie'])->name('edite_Fiche_de_paie');
Route::get('/Fiche_de_paie/{matricule}/recherche', [fiche_de_paieController::class, 'recherche_Fiche_de_paie'])->name('recherche_Fiche_de_paie');
Route::put('/Fiche_de_paie/{Fiche_de_paie}/modifier', [fiche_de_paieController::class, 'modifier_Fiche_de_paie'])->name('modifier_Fiche_de_paie');
Route::put('/Fiche_de_paie/{id}/archiver', [fiche_de_paieController::class, 'archiver_Fiche_de_paie'])->name('archiver_Fiche_de_paie');
Route::get('/formulaireAjout/{employe}/remunerer', [fiche_de_paieController::class, 'formulaireAjoutfichedepaie'])->name('formulaireAjoutfichedepaie');




//Route courriers
Route::post('/demande_Abscence_conge', [courrierController::class, 'demande_Abscence_conge'])->name('demande_Abscence_conge');
Route::get('/listeFiche_de_courrrier', [courrierController::class, 'listeFiche_de_courrrier'])->name('listeFiche_de_courrrier');


Route::post('/sanction', [courrierController::class, 'sanction'])->name('sanction');
Route::put('/courrier/{courrier}/accepter', [courrierController::class, 'accepter_demande'])->name('accepter_demande');
Route::put('/courrier/{courrier}/refuser', [courrierController::class, 'refuser_demande'])->name('refuser_demande');
Route::get('/statistiques', [statistiqueController::class, 'statistiques'])->name('statistiques');
Route::get('/formulaireAjoutSanction/{employe}/courrier', [courrierController::class, 'formulaireAjoutSanction'])->name('formulaireAjoutSanction');





Route::get('/weather', [WeatherController::class, 'show']);




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');
});
