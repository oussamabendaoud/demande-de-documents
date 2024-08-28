<!-- resources/views/service_communication.blade.php -->

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service de Communication - Liste des Demandes de Documents</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4">Liste des Demandes de Documents</h2>

        <!-- Vérifier s'il y a des demandes -->
        @if($demandes->isEmpty())
        <p>Aucune demande de document trouvée.</p>
        @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Date de Naissance</th>
                    <th>CIN/Numéro de Passeport</th>
                    <th>Filière</th>
                    <th>Niveau</th>
                    <th>Attestation Demandée</th>
                    <th>Date de Demande</th>
                </tr>
            </thead>
            <tbody>
                @foreach($demandes as $demande)
                <tr>
                    <td>{{ $demande->nom }}</td>
                    <td>{{ $demande->prenom }}</td>
                    <td>{{ $demande->email }}</td>
                    <td>{{ $demande->date_naissance }}</td>
                    <td>{{ $demande->cin }}</td>
                    <td>{{ $demande->filere }}</td>
                    <td>{{ $demande->niveau }}</td>
                    <td>{{ ucfirst(str_replace('_', ' ', $demande->attestation)) }}</td>
                    <td>{{ $demande->created_at->format('d/m/Y H:i') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>

</html>