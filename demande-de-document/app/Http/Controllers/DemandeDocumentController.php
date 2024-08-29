<?php

namespace App\Http\Controllers;

// app/Http/Controllers/DemandeDocumentController.php

use App\Models\DemandeDocument;
use Illuminate\Http\Request;

class DemandeDocumentController extends Controller
{

    public function scolarite()
{
    // Récupérer les demandes avec le statut "envoyée"
    $demandes = DemandeDocument::where('status', 'envoyée')->get();

    // Passer les demandes à la vue
    return view('service_scolarite', compact('demandes'));
}


    public function envoyer($id)
{
    // Rechercher la demande de document par son ID
    $demande = DemandeDocument::findOrFail($id);

    // Ici, ajoutez la logique pour envoyer la demande au service scolarité
    // Par exemple, vous pouvez envoyer un email, mettre à jour l'état de la demande, etc.

    // Exemple : Mettre à jour un champ 'envoyée' pour indiquer que la demande a été envoyée
    $demande->update(['status' => 'envoyée']);

    // Rediriger avec un message de succès
    return redirect()->route('service.communication')->with('success', 'La demande a été envoyée avec succès.');
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
          // Validate the request data
          $validatedData = $request->validate([
              'nom' => 'required|string|max:255',
              'prenom' => 'required|string|max:255',
              'email' => 'required|string|max:255',
              'date_naissance' => 'required|date',
              'cin' => 'nullable|string|max:255',
              'filere' => 'required|string|max:255',
              'niveau' => 'required|in:1ere,2eme,3eme,4eme,5eme',
              'attestation' => 'required|array',
              'attestation.*' => 'in:attestation_inscription,attestation_scolarite,attestation_reussite,releve_notes,convention_stage,diplome',
          ]);
            // Convert the attestation array to a JSON string
            $validatedData['attestation'] = json_encode($validatedData['attestation']);
        
            // Store the demande document with status
            DemandeDocument::create(array_merge($validatedData, ['status' => 'nouvelle']));
        
            return redirect()->route('demande.create')->with('success', 'Votre demande a été soumise avec succès.');
        }
      



      
      

}