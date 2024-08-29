<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container py-4">
        <header class="pb-3 mb-4 border-bottom">
          <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="32" class="me-2" viewBox="0 0 118 94" role="img"><title>Demande Documment</title><path fill-rule="evenodd" clip-rule="evenodd" d="M24.509 0c-6.733 0-11.715 5.893-11.492 12.284.214 6.14-.064 14.092-2.066 20.577C8.943 39.365 5.547 43.485 0 44.014v5.972c5.547.529 8.943 4.649 10.951 11.153 2.002 6.485 2.28 14.437 2.066 20.577C12.794 88.106 17.776 94 24.51 94H93.5c6.733 0 11.714-5.893 11.491-12.284-.214-6.14.064-14.092 2.066-20.577 2.009-6.504 5.396-10.624 10.943-11.153v-5.972c-5.547-.529-8.934-4.649-10.943-11.153-2.002-6.484-2.28-14.437-2.066-20.577C105.214 5.894 100.233 0 93.5 0H24.508zM80 57.863C80 66.663 73.436 72 62.543 72H44a2 2 0 01-2-2V24a2 2 0 012-2h18.437c9.083 0 15.044 4.92 15.044 12.474 0 5.302-4.01 10.049-9.119 10.88v.277C75.317 46.394 80 51.21 80 57.863zM60.521 28.34H49.948v14.934h8.905c6.884 0 10.68-2.772 10.68-7.727 0-4.643-3.264-7.207-9.012-7.207zM49.948 49.2v16.458H60.91c7.167 0 10.964-2.876 10.964-8.281 0-5.406-3.903-8.178-11.425-8.178H49.948z" fill="currentColor"></path></svg>
            <span class="fs-4">Demande Documment</span>
          </a>
        </header>
    
        <div class="p-5 mb-4 bg-light rounded-3">
          <div class="container-fluid py-5">
            <h2 class="display-5 fw-bold">Demande Documment</h2>
            <p>Simplifiez vos démarches en ligne. Faites votre demande de fichiers directement auprès de notre administration scolaire.</p>
            <div class="container py-4">
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

                <form class="row g-3" action="{{ route('demande.store') }}" method="POST">
                @csrf
                    <div class="col-md-4">
                      <label for="nom" class="form-label">Nom</label>
                      <input type="text" class="form-control" id="nom" name="nom" value="{{ old('nom') }}" required>
                    </div>
                    <div class="col-md-4">
                      <label for="prenom" class="form-label">Prénom</label>
                      <input type="text" class="form-control" id="prenom" name="prenom" value="{{ old('prenom') }}" required>
                    </div>
                    <div class="col-md-4">
                        <label for="date_naissance" class="form-label">Date de naissance</label>
                        <input type="Date" class="form-control" id="date_naissance" name="date_naissance" value="{{ old('date_naissance') }}" required>
                      </div>
                    <div class="col-md-4">
                      <label for="email" class="form-label">Email</label>
                      <div class="input-group">
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                      </div>
                    </div>
                    <div class="col-md-4">
                        <label for="cin" class="form-label">CIN</label>
                        <input type="text" class="form-control" id="cin" name="cin" value="{{ old('cin') }}" required>
                    </div>
                    <div class="col-md-4">
                        <label for="filere" class="form-label">Filière</label>
                        <select class="form-select" id="filere" name="filere" required>
                          <option selected disabled value="">Filière...</option>
                          <option value="MGE" {{ old('filere') == 'MGE' ? 'selected' : '' }}>MGE</option>
                          <option value="ISI" {{ old('filere') == 'ISI' ? 'selected' : '' }}>ISI</option>
                        </select>
                      </div>
                      <div class="col-md-4">
                        <label for="niveau" class="form-label">Niveau</label>
                        <select class="form-select" id="niveau" name="niveau" required>
                          <option selected disabled value="">Niveau...</option>
                          <option value="1ere" {{ old('niveau') == '1ere' ? 'selected' : '' }}>1er Année</option>
                          <option value="2eme" {{ old('niveau') == '2eme' ? 'selected' : '' }}>2ème Année</option>
                          <option value="3eme" {{ old('niveau') == '3eme' ? 'selected' : '' }}>3ème Année</option>
                          <option value="4eme" {{ old('niveau') == '4eme' ? 'selected' : '' }}>4ème Année</option>
                          <option value="5eme" {{ old('niveau') == '5eme' ? 'selected' : '' }}>5ème Année</option>
                        </select>
                      </div>


                    <div class="col-12">
                    
                      <label class="form-label">Attestation demandée:</label>
                      <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="attestation_inscription" name="attestation[]" value="attestation_inscription"
                              {{ in_array('attestation_inscription', old('attestation', [])) ? 'checked' : '' }}>
                          <label class="form-check-label" for="attestation_inscription">Attestation d'inscription</label>
                      </div>
                      <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="attestation_scolarite" name="attestation[]" value="attestation_scolarite"
                              {{ in_array('attestation_scolarite', old('attestation', [])) ? 'checked' : '' }}>
                          <label class="form-check-label" for="attestation_scolarite">Attestation de scolarité</label>
                      </div>
                      <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="attestation_reussite" name="attestation[]" value="attestation_reussite"
                              {{ in_array('attestation_reussite', old('attestation', [])) ? 'checked' : '' }}>
                          <label class="form-check-label" for="attestation_reussite">Attestation de réussite</label>
                      </div>
                      <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="releve_notes" name="attestation[]" value="releve_notes"
                              {{ in_array('releve_notes', old('attestation', [])) ? 'checked' : '' }}>
                          <label class="form-check-label" for="releve_notes">Relevé de notes</label>
                      </div>
                      <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="convention_stage" name="attestation[]" value="convention_stage"
                              {{ in_array('convention_stage', old('attestation', [])) ? 'checked' : '' }}>
                          <label class="form-check-label" for="convention_stage">Convention de stage</label>
                      </div>
                      <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="diplome" name="attestation[]" value="diplome"
                              {{ in_array('diplome', old('attestation', [])) ? 'checked' : '' }}>
                          <label class="form-check-label" for="diplome">Diplôme</label>
                      </div>
                  </div>
                    <div class="col-12">
                      <button class="btn btn-primary" type="submit">Submit form</button>
                    </div>
                  </form>

            </div>
          </div>
        </div>
    
        
    

      </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
  <footer class="pt-3 mt-4 text-muted border-top">
    © SupMTI OUJDA 2024
  </footer>
</html>