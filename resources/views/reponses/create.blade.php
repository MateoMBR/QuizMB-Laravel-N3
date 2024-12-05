<!-- resources/views/reponses/create.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <h1>Ajouter une Réponse</h1>

        <form action="{{ route('reponses.store') }}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label for="content" class="form-label">Réponse :</label>
                <textarea name="content" id="content" class="form-control" rows="3" required></textarea>
            </div>
            <div class="form-group mb-3">
                <label for="is_correct" class="form-label">La réponse est-elle correcte ?</label>
                <select name="is_correct" id="is_correct" class="form-control">
                    <option value="0">Non</option>
                    <option value="1">Oui</option>
                </select>
            </div>
            <input type="hidden" name="question_id" value="{{ $question->id }}">
            <button type="submit" class="btn btn-primary">Ajouter Réponse</button>
        </form>
    </div>
@endsection
