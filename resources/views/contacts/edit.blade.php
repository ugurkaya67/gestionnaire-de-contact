<!-- resources/views/contacts/edit.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier le Contact</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1 class="text-center">Modifier le Contact</h1>

        <!-- Formulaire de modification -->
        <form action="{{ route('contacts.update', $contact->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- Cette méthode permet de faire un PUT pour mettre à jour -->
            
            <div class="mb-3">
                <label for="nom" class="form-label">Nom:</label>
                <input type="text" name="nom" id="nom" class="form-control" value="{{ old('nom', $contact->nom) }}" required>
            </div>

            <div class="mb-3">
                <label for="prenom" class="form-label">Prénom:</label>
                <input type="text" name="prenom" id="prenom" class="form-control" value="{{ old('prenom', $contact->prenom) }}" required>
            </div>

            <div class="mb-3">
                <label for="numero" class="form-label">Numéro:</label>
                <input type="text" name="numero" id="numero" class="form-control" value="{{ old('numero', $contact->numero) }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Mettre à jour</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
