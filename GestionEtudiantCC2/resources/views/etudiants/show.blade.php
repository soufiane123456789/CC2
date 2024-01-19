<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de l'Étudiant</title>
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
        <h1>Détails de l'Étudiant</h1>
        <p><strong>Nom:</strong> {{ $etudiant->nom }}</p>
        <p><strong>Prénom:</strong> {{ $etudiant->prenom }}</p>
        <p><strong>Sexe:</strong> {{ $etudiant->sexe }}</p>
        <p><strong>Filière:</strong> {{ $etudiant->filiere->nom }}</p>

        <a href="{{ route('etudiants.index') }}" class="btn btn-secondary">Retour à la liste des Étudiants</a>

        <a href="{{ route('etudiants.edit', $etudiant->id) }}" class="btn btn-warning">Modifier</a>
        
        <form action="{{ route('etudiants.destroy', $etudiant->id) }}" method="post" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Supprimer</button>
        </form>
    </div>

    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
