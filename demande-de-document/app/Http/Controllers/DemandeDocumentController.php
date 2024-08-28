<?php

namespace App\Http\Controllers;

// app/Http/Controllers/DemandeDocumentController.php

use App\Models\DemandeDocument;
use Illuminate\Http\Request;

class DemandeDocumentController extends Controller
{

      // Méthode pour afficher le formulaire de demande de document
      public function create()
      {
          return view('demandedocument'); // Retourne la vue demande_document.blade.php
      }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'date_naissance' => 'required|date',
            'cin' => 'nullable|string|max:255',
            'filere' => 'required|string|max:255',
            'niveau' => 'required|in:1ere,2eme,3eme,4eme,5eme',
            'attestation' => 'required|in:attestation_inscription,attestation_scolarite,attestation_reussite,releve_notes,convention_stage,diplome',
        ]);

        DemandeDocument::create($validatedData);

        return redirect()->route('demande.create')->with('success', 'Votre demande a été soumise avec succès.');
    }
}