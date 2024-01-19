<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Formulaire de Filière</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
</head>
<body>
    @auth
    <p>Welcome, {{ Auth::user()->name }}</p>
    @endauth

    <div class="container mt-5">
        <h1>Formulaire de Filière</h1>

        @if(isset($filiere))
            <form action="{{ route('filiere.update', $filiere->id) }}" method="POST">
                @method('PUT')
                <input type="hidden" name="id" value="{{ $filiere->id }}">
        @else
            <form action="{{ route('filiere.store') }}" method="POST">
        @endif
                @csrf
                <div class="mb-3">
                    <label for="nom" class="form-label">Nom de la Filière:</label>
                    <input type="text" class="form-control" id="nom" name="nom" value="{{ isset($filiere) ? $filiere->nom : '' }}">
                </div>

                <button type="submit" class="btn btn-primary">{{ isset($filiere) ? 'Mettre à jour' : 'Ajouter' }}</button>
            </form>

        <a href="{{ route('filiere.index') }}" class="mt-3 btn btn-secondary">Retour à la liste des Filières</a>
    </div>

    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
