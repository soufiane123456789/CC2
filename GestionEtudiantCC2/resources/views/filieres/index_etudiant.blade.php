<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Filières</title>
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
        <h1>Liste des Filières</h1>

        <ul class="list-group">
            @foreach($filieres as $filiere)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="{{ route('filiere.show', $filiere->id) }}">
                        {{ $filiere->nom }}
                    </a>
                    
                </li>
            @endforeach
        </ul>

        <h2><a href="{{ route('index') }}" class="btn btn-secondary">Retour vers la page d'accueil</a></h2>
    </div>

    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
