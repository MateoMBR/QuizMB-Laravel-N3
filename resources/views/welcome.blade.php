<!-- resources/views/welcome.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Accueil - Quizzzz by MB</title>
    <!-- Bootstrap CSS depuis jsDelivr -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Inclure le fichier de navigation -->
@include('partials.navigation')

<div class="container mt-5">
    <h1 class="text-2xl font-bold">Liste des Questions et Réponses</h1>
    <!-- Bouton pour afficher/masquer le statut des réponses -->
    <button id="toggleStatusButton" class="btn btn-secondary mb-3">Afficher Statut des Réponses</button>

    @foreach($questions as $question)
        <div class="card mt-4">
            <div class="card-body">
                <h2 class="card-title h5">{{ $question->title }}</h2>
                @if($question->description)
                    <p class="card-text">{{ $question->description }}</p>
                @endif
                <ul class="list-group list-group-flush">
                    @foreach($question->reponses as $reponse)
                        <li class="list-group-item">
                            {{ $reponse->content }}
                            <!-- Ajouter le statut par défaut masqué -->
                            <span class="status-badge badge {{ $reponse->is_correct ? 'bg-success' : 'bg-danger' }}" style="display: none;">
                                {{ $reponse->is_correct ? 'Correcte' : 'Incorrecte' }}
                            </span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endforeach
</div>

<!-- JavaScript pour basculer l'affichage du statut des réponses -->
<script>
    document.getElementById('toggleStatusButton').addEventListener('click', function() {
        const statusBadges = document.querySelectorAll('.status-badge');
        const isHidden = Array.from(statusBadges).some(badge => badge.style.display === 'none');

        statusBadges.forEach(badge => {
            badge.style.display = isHidden ? 'inline-block' : 'none';
        });

        this.innerText = isHidden ? 'Masquer Statut des Réponses' : 'Afficher Statut des Réponses';
    });
</script>

<!-- Bootstrap JS (optionnel pour JS interactif) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
