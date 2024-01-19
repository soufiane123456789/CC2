<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire Étudiant</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
</head>
<body>
    @auth
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Welcome, {{ Auth::user()->name }}</a>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    @endauth

    <div class="container mt-4">
        <h1>Formulaire Étudiant</h1>

        @if(isset($etudiant))
            <form action="{{ route('etudiants.update', $etudiant->id) }}" method="POST">
                @method('PUT')
                <input type="hidden" name="id" value="{{ $etudiant->id }}">
        @else
            <form action="{{ route('etudiants.store') }}" method="POST">
        @endif
                @csrf

                <!-- Etudiant fields -->
                <div class="mb-3">
                    <label for="nom" class="form-label">Nom:</label>
                    <input type="text" class="form-control" id="nom" name="nom" value="{{ isset($etudiant) ? $etudiant->nom : '' }}">
                </div>

                <div class="mb-3">
                    <label for="prenom" class="form-label">Prénom:</label>
                    <input type="text" class="form-control" id="prenom" name="prenom" value="{{ isset($etudiant) ? $etudiant->prenom : '' }}">
                </div>

                <div class="mb-3">
                    <label for="sexe" class="form-label">Sexe:</label>
                    <select class="form-select" id="sexe" name="sexe">
                        <option value="homme" {{ isset($etudiant) && $etudiant->sexe === 'homme' ? 'selected' : '' }}>Homme</option>
                        <option value="femme" {{ isset($etudiant) && $etudiant->sexe === 'femme' ? 'selected' : '' }}>Femme</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="filiere_id" class="form-label">Filière:</label>
                    <select class="form-select" id="filiere_id" name="filiere_id">
                        @foreach($filieres as $filiere)
                            <option value="{{ $filiere->id }}" @if(isset($etudiant) && $etudiant->filiere_id == $filiere->id) selected @endif>{{ $filiere->nom }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="user[name]" class="form-label">User Name:</label>
                    <input type="text" class="form-control" id="user[name]" name="user[name]" value="{{ isset($etudiant->user) ? $etudiant->user->name : '' }}" placeholder="User Name">
                </div>

                <div class="mb-3">
                    <label for="user[type]" class="form-label">User Type:</label>
                    <select class="form-select" id="user[type]" name="user[type]">
                        <option value="admin" {{ isset($etudiant->user) && $etudiant->user->type === 'admin' ? 'selected' : '' }}>admin</option>
                        <option value="etudiant" {{ isset($etudiant->user) && $etudiant->user->type === 'etudiant' ? 'selected' : '' }}>etudiant</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="user[email]" class="form-label">User Email:</label>
                    <input type="email" class="form-control" id="user[email]" name="user[email]" value="{{ isset($etudiant->user) ? $etudiant->user->email : '' }}" placeholder="User Email">
                </div>


                


                

                <div class="mb-3">
                    <label for="user[password]" class="form-label">User Password:</label>
                    <input type="password" class="form-control" id="user[password]" name="user[password]" placeholder="User Password">
                </div>

                <button type="submit" class="btn btn-primary">{{ isset($etudiant) ? 'Mettre à jour' : 'Ajouter' }}</button>
            </form>

        <a href="{{ route('etudiants.index') }}" class="btn btn-secondary mt-3">Retour à la liste des Étudiants</a>
    </div>

    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
