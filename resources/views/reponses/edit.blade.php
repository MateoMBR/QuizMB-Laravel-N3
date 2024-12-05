<!-- Assurez-vous que ce fichier est placé dans une section de layout, comme avec create -->
@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <h1>Modifier une Réponse</h1>

        <form action="{{ route('reponses.update', $reponse) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group mb-3">
                <label for="content" class="form-label">Réponse :</label>
                <textarea name="content" id="content" class="form-control" rows="3" required>{{ old('content', $reponse->content) }}</textarea>
            </div>

            <div class="form-group mb-3">
                <label for="is_correct" class="form-label">La réponse est-elle correcte ?</label>
                <select name="is_correct" id="is_correct" class="form-control">
                    <option value="0" {{ !$reponse->is_correct ? 'selected' : '' }}>Non</option>
                    <option value="1" {{ $reponse->is_correct ? 'selected' : '' }}>Oui</option>
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="question_id" class="form-label">Question :</label>
                <select name="question_id" id="question_id" class="form-control" required>
                    @foreach($questions as $question)
                        <option value="{{ $question->id }}" {{ $question->id == $reponse->question_id ? 'selected' : '' }}>
                            {{ $question->title }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Modifier Réponse</button>
        </form>
    </div>
@endsection
