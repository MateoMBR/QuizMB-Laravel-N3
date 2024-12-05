@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <div class="row">
            <div class="col-12">
                <h1 class="mb-4">Liste des Questions</h1>
                <div class="mb-3">
                    <a href="{{ route('questions.create') }}" class="btn btn-primary">Ajouter une question</a>
                </div>
                <div class="card shadow-sm">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead class="table-light">
                            <tr>
                                <th>ID</th>
                                <th>Titre</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($questions as $question)
                                <tr>
                                    <td>{{ $question->id }}</td>
                                    <td>{{ $question->title }}</td>
                                    <td>{{ $question->description }}</td>
                                    <td>
                                        <a href="{{ route('questions.edit', $question) }}" class="btn btn-warning btn-sm">Modifier</a>
                                        <form action="{{ route('questions.destroy', $question) }}" method="POST" class="d-inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                                        </form>
                                        <a href="{{ route('reponses.create', $question->id) }}" class="btn btn-success btn-sm">+</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">
                                        <strong>Réponses:</strong>
                                        <ul class="list-unstyled">
                                            @foreach($question->reponses as $reponse)
                                                <li>
                                                    {{ $reponse->content }}
                                                    @if($reponse->is_correct)
                                                        <span class="badge bg-success">Correcte</span>
                                                    @else
                                                        <span class="badge bg-danger">Incorrecte</span>
                                                    @endif
                                                    <a href="{{ route('reponses.edit', $reponse->id) }}" class="btn btn-warning btn-sm ml-2">Modifier</a>
                                                    <form action="{{ route('reponses.destroy', $reponse) }}" method="POST" class="d-inline-block">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm ml-1">Supprimer</button>
                                                    </form>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
