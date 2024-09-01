<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documents Envoyés Archivés</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4">Liste des Documents Envoyés Archivés</h2>

        @if($documentsEnvoyesArchives->isEmpty())
        <p>Aucun document envoyé archivé trouvé.</p>
        @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Date de Demande</th>
                    <th>Attestations</th>
                </tr>
            </thead>
            <tbody>
                @foreach($documentsEnvoyesArchives as $archive)
                <tr>
                    <td>{{ $archive->nom }}</td>
                    <td>{{ $archive->prenom }}</td>
                    <td>{{ $archive->email }}</td>
                    <td>{{ $archive->created_at->format('d/m/Y H:i') }}</td>
                    <td>{{ $archive->attestations }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</body>

</html>