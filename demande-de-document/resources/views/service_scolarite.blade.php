<!-- resources/views/service_scolarite.blade.php -->
@extends('layouts.app')

@section('title', 'Home Page')

@section('content')
<main style="margin-top: 5px">
    <div class="container pt-4">
        <div class="container mt-5">
            <!-- Main Content -->
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            <!-- Buttons to redirect to archived requests -->
            <div class="mb-4">

                <a href="{{ route('documents.envoyes_archives') }}" class="btn btn-secondary">Voir les Documents Envoyés
                    Archivés</a>
            </div>

            <!-- DataTable Code starts -->
            <div class="jumbotron">
                <h2 class="mb-4">Liste des Demandes de Documents - Statut : Envoyée</h2>
                <hr class="my-4">

                <!-- Vérifier s'il y a des demandes -->
                @if($demandes->isEmpty())
                <p>Aucune demande de document envoyée n'a été trouvée.</p>
                @else
                <table id="example" class="table table-striped nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Email</th>
                            <th>Date de Demande</th>
                            <th>CIN/Numéro de Passeport</th>
                            <th>Filière</th>
                            <th>Niveau</th>
                            <th>Attestation Demandée</th>
                            <th>Date de Naissance</th>
                            <th>Envoyer le document</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($demandes as $demande)
                        <tr>
                            <td>{{ $demande->nom }}</td>
                            <td>{{ $demande->prenom }}</td>
                            <td>{{ $demande->email }}</td>
                            <td>{{ $demande->created_at->format('d/m/Y H:i') }}</td>
                            <td>{{ $demande->cin }}</td>
                            <td>{{ $demande->filere }}</td>
                            <td>{{ $demande->niveau }}</td>
                            <td>
                                @php
                                // Split the comma-separated attestation string into an array
                                $attestations = explode(',', $demande->attestation);
                                @endphp
                                @if(count($attestations) > 0)
                                @foreach($attestations as $attestation)
                                <span
                                    class="badge badge-info">{{ ucfirst(str_replace('_', ' ', $attestation)) }}</span><br>
                                @endforeach
                                @else
                                <span class="text-danger">Aucune attestation spécifiée</span>
                                @endif
                            </td>
                            <td>{{ $demande->date_naissance }}</td>
                            <td>
                                <form action="{{ route('demande.envoyer_document', ['id' => $demande->id]) }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="file" class="form-label">Choisir fichier :</label>
                                        <input type="file" id="file" name="file" class="form-control" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Envoyer le document</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
            </div>
        </div>
    </div>
</main>
@endsection