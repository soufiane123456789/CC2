<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Détails de la Filière</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
</head>
<body>
    @auth
    <div class="container mt-3">
        <p>Welcome, {{ Auth::user()->name }}</p>
    </div>
    @endauth
    
    <div class="container mt-5">
        <p> <a href="{{ route('logout') }}" class="btn btn-secondary">Logout</a> </p>
        <h1>Détails de la Filière</h1>

        <p><strong>Nom:</strong> {{ $filieres->nom }}</p>

        <a href="{{ route('filiere.index') }}" class="btn btn-primary">Retour à la liste des Filières</a>
        <a href="{{ route('filiere.edit', $filieres->id) }}" class="btn btn-warning">Modifier</a>
        
        <!-- Utilisation d'un formulaire pour la suppression pour des raisons de sécurité -->
        <form action="{{ route('filiere.destroy', $filieres->id) }}" method="POST" style="display: inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Voulez-vous vraiment supprimer cette filière?')">Supprimer</button>
        </form>
    </div>

    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
