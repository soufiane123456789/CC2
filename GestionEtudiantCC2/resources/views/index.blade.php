<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Page d'accueil</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
</head>
<body class="bg-warning text-dark">

    @auth
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand text-primary" href="/">Welcome, {{ Auth::user()->name }}</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link text-danger" href="{{ route('logout') }}">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    @endauth

    <div class="container mt-4">
        <h1 class="display-4 text-dark">Home Page</h1>
        <div class="row">
            <div class="col-md-6">
                <div class="card bg-white text-dark">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Liste des Filières</h5>
                        <p class="card-text">Répertoire des Filières.</p>
                        <a href="{{ route('filiere.index') }}" class="btn btn-primary">Voir la liste</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card bg-white text-dark">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Liste des Étudiants</h5>
                        <p class="card-text">Registre des étudiants Inscrits</p>
                        <a href="{{ route('etudiants.index') }}" class="btn btn-primary">Voir la liste</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
