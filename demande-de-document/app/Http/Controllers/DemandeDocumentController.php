<?php

namespace App\Http\Controllers;

// app/Http/Controllers/DemandeDocumentController.php

use App\Models\DemandeDocument;
use App\Models\Archive;
use App\Models\DemandeArchive;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Mail\DocumentEnvoye;

class DemandeDocumentController extends Controller
{


    public function archiverDemandesEnvoyees()
{
    // Récupérer les demandes avec le statut "envoyé"
    $demandesEnvoyees = DemandeDocument::where('status', 'envoyé')->get();

    foreach ($demandesEnvoyees as $demande) {
        // Archiver la demande dans la table demande_archive
        DemandeArchive::create([
            'nom' => $demande->nom,
            'prenom' => $demande->prenom,
            'email' => $demande->email,
            'date_naissance' => $demande->date_naissance,
            'cin' => $demande->cin,
            'filere' => $demande->filere,
            'niveau' => $demande->niveau,
            'attestations' => $demande->attestations,
            'created_at' => $demande->created_at,
            'updated_at' => now(),
        ]);

        // Supprimer la demande de la table "demande_documents"
        $demande->delete();
    }

    // Rediriger avec un message de succès
    return redirect()->route('service.communication')->with('success', 'Les demandes envoyées ont été archivées avec succès.');
}

public function envoyerDocument(Request $request, $id)
{
    $request->validate([
        'file' => 'required|file|max:10240',  // Maximum 10MB
    ]);

    // Récupérer la demande
    $demande = DemandeArchive::findOrFail($id); // Change to DemandeArchive
    $document = $request->file('file');

    // Envoyer l'email avec le document attaché
    Mail::to($demande->email)->send(new DocumentEnvoye($document, $demande->nom));

    // Vérifier que 'attestations' n'est pas null ou vide, sinon définir une valeur par défaut
    $attestations = $demande->attestations ?: 'Aucune attestation spécifiée';

    // Archiver la demande
    Archive::create([
        'nom' => $demande->nom,
        'prenom' => $demande->prenom,
        'email' => $demande->email,
        'date_naissance' => $demande->date_naissance,
        'cin' => $demande->cin,
        'filere' => $demande->filere,
        'niveau' => $demande->niveau,
        'attestations' => $attestations,
        'created_at' => $demande->created_at,
        'updated_at' => now(),
    ]);

    // Supprimer la demande de la table "demande_archive"
    $demande->delete();

    // Rediriger avec un message de succès
    return redirect()->route('service.scolarite')->with('success', 'Le document a été envoyé, la demande a été archivée et supprimée de la liste.');
}

    public function scolarite()
    {
        // Récupérer toutes les demandes de la table demande_archive
        $demandes = DemandeArchive::all();

        // Passer les demandes à la vue
        return view('service_scolarite', compact('demandes'));
    }
    


public function envoyer(Request $request, $id)
{
    // Récupérer la demande
    $demande = DemandeDocument::findOrFail($id);

    // Vérifier que 'attestations' n'est pas null ou vide, sinon définir une valeur par défaut
    $attestations = $demande->attestations ?: 'Aucune attestation spécifiée';

    // Archiver la demande
    DemandeArchive::create([
        'nom' => $demande->nom,
        'prenom' => $demande->prenom,
        'email' => $demande->email,
        'date_naissance' => $demande->date_naissance,
        'cin' => $demande->cin,
        'filere' => $demande->filere,
        'niveau' => $demande->niveau,
        'attestations' => $attestations,
        'created_at' => $demande->created_at,
        'updated_at' => now(),
    ]);

    // Supprimer la demande de la table "demande_documents"
    $demande->delete();

    // Rediriger avec un message de succès
    return redirect()->back()->with('success', 'La demande a été envoyée, archivée et supprimée de la liste.');
}

    public function index()
    {
        // Récupérer toutes les demandes de documents
        $demandes = DemandeDocument::all();

        // Passer les demandes à la vue
        return view('service_communication', compact('demandes'));
    }

      // Méthode pour afficher le formulaire de demande de document
      public function create()
      {
          return view('demandedocument'); // Retourne la vue demande_document.blade.php
      }

      public function store(Request $request)
      {
          // Validate the incoming request
          $request->validate([
              'nom' => 'required|string',
              'prenom' => 'required|string',
              'date_naissance' => 'required|date',
              'email' => 'required|email',
              'cin' => 'required|string',
              'filere' => 'required|string',
              'niveau' => 'required|string',
              'attestation' => 'required|array', // Attestation should be an array
          ]);
  
          // Convert the attestation array to a comma-separated string
          $data = $request->all();
          $data['attestation'] = implode(',', $request->input('attestation')); // Convert to a comma-separated string
  
          // Insert the data into the database
          DemandeDocument::create($data);
  
          // Redirect or return a response
          return redirect()->back()->with('success', 'Demande enregistrée avec succès.');
      }
  


      
      

}