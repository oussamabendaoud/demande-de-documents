<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemandeDocumentController;


Route::get('/', function () {
    return view('DemandeDocument');
});




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route pour afficher le formulaire de demande de document
Route::get('/', [DemandeDocumentController::class, 'create'])->name('demande.create');

// Route pour traiter la soumission du formulaire
Route::post('/demande-document', [DemandeDocumentController::class, 'store'])->name('demande.store');
Route::get('/service-communication', [DemandeDocumentController::class, 'index'])->name('service.communication');
Route::post('/demande/{id}/envoyer', [DemandeDocumentController::class, 'envoyer'])->name('demande.envoyer');
Route::get('/service-scolarite', [DemandeDocumentController::class, 'scolarite'])->name('service.scolarite');
Route::post('/envoyer-document/{id}', [DemandeDocumentController::class, 'envoyerDocument'])->name('demande.envoyer_document');