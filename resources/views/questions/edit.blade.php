@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h3 class="mb-0">Modifier la Question</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('questions.update', $question->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group mb-3">
                                <label for="title" class="form-label">Titre :</label>
                                <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $question->title) }}" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="description" class="form-label">Description :</label>
                                <textarea name="description" id="description" class="form-control" rows="3" required>{{ old('description', $question->description) }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Sauvegarder</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
