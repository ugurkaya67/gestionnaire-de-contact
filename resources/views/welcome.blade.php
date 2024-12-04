<!-- resources/views/welcome.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionnaire de Contacts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-B4gt1jrGC7Jh4AgTPSJzo0cDLch1uwnq0a3P9xzU9z5I5JH37Pq2+Jji3t/pf3dm" crossorigin="anonymous">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1 class="text-center">Gestionnaire de Contacts</h1>

        <!-- Button to add new contact -->
        <div class="text-end mb-3">
            <!-- Formulaire pour ajouter un contact -->
            <form action="{{ route('contacts.store') }}" method="POST">
                @csrf
                <h2>Ajouter un Nouveau Contact</h2>
                
                <label for="nom">Nom:</label>
                <input type="text" name="nom" id="nom" required>

                <label for="prenom">Prénom:</label>
                <input type="text" name="prenom" id="prenom" required>

                <label for="numero">Numéro:</label>
                <input type="text" name="numero" id="numero" required>

                <button type="submit">Ajouter Contact</button>
            </form>
        </div>

        <!-- Table of contacts -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Numéro</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Loop to display all contacts -->
                @foreach($contacts as $contact)
                    <tr>
                        <th scope="row">{{ $contact->id }}</th>
                        <td>{{ $contact->nom }}</td>
                        <td>{{ $contact->prenom }}</td>
                        <td>{{ $contact->numero }}</td>
                        <td>
                            <!-- Bouton Modifier avec la classe personnalisée -->
                            <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-action btn-action-modifier">Modifier</a>

                            <!-- Bouton Supprimer avec la classe personnalisée -->
                            <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" style="padding: 0 !important;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-action btn-action-supprimer" >Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka8yQWqU+xCp/lym0p18wpbg4gqlzZG7Lpq6OBlpD/MH0qA6Iut1Xy0wGf3OGy6j" crossorigin="anonymous"></script>
</body>
</html>
