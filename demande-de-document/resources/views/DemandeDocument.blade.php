<!-- resources/views/demande_document.blade.php -->

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demande de Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4">Formulaire de Demande de Document</h2>

        <!-- Affichage des messages de succès -->
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <!-- Affichage des erreurs de validation -->
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <!-- Formulaire -->
        <form action="{{ route('demande.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="nom" class="form-label">Nom:</label>
                <input type="text" class="form-control" id="nom" name="nom" value="{{ old('nom') }}" required>
            </div>

            <div class="mb-3">
                <label for="prenom" class="form-label">Prénom:</label>
                <input type="text" class="form-control" id="prenom" name="prenom" value="{{ old('prenom') }}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
            </div>


            <div class="mb-3">
                <label for="date_naissance" class="form-label">Date de naissance:</label>
                <input type="date" class="form-control" id="date_naissance" name="date_naissance"
                    value="{{ old('date_naissance') }}" required>
            </div>

            <div class="mb-3">
                <label for="cin" class="form-label">CIN ou Numéro de passeport:</label>
                <input type="text" class="form-control" id="cin" name="cin" value="{{ old('cin') }}">
            </div>




            <div class="mb-3">
                <label for="filere" class="form-label">Filière:</label>
                <select class="form-select" id="filere" name="filere" required>
                    <option value="MGE" {{ old('filere') == 'MGE' ? 'selected' : '' }}>MGE</option>
                    <option value="ISI" {{ old('filere') == 'ISI' ? 'selected' : '' }}>ISI</option>
                </select>
            </div>






            <div class="mb-3">
                <label for="niveau" class="form-label">Niveau:</label>
                <select class="form-select" id="niveau" name="niveau" required>
                    <option value="1ere" {{ old('niveau') == '1ere' ? 'selected' : '' }}>1ère</option>
                    <option value="2eme" {{ old('niveau') == '2eme' ? 'selected' : '' }}>2ème</option>
                    <option value="3eme" {{ old('niveau') == '3eme' ? 'selected' : '' }}>3ème</option>
                    <option value="4eme" {{ old('niveau') == '4eme' ? 'selected' : '' }}>4ème</option>
                    <option value="5eme" {{ old('niveau') == '5eme' ? 'selected' : '' }}>5ème</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="attestation" class="form-label">Attestation demandée:</label>
                <select class="form-select" id="attestation" name="attestation" required>
                    <option value="attestation_inscription"
                        {{ old('attestation') == 'attestation_inscription' ? 'selected' : '' }}>Attestation
                        d'inscription</option>
                    <option value="attestation_scolarite"
                        {{ old('attestation') == 'attestation_scolarite' ? 'selected' : '' }}>
                        Attestation de scolarité
                    </option>
                    <option value="attestation_reussite"
                        {{ old('attestation') == 'attestation_reussite' ? 'selected' : '' }}>
                        Attestation de réussite
                    </option>
                    <option value="releve_notes" {{ old('attestation') == 'releve_notes' ? 'selected' : '' }}>Relevé de
                        notes</option>
                    <option value="convention_stage" {{ old('attestation') == 'convention_stage' ? 'selected' : '' }}>
                        Convention de stage</option>
                    <option value="diplome" {{ old('attestation') == 'diplome' ? 'selected' : '' }}>Diplôme</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Soumettre</button>
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>

</html>