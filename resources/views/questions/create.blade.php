@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-success text-white">
                        <h3 class="mb-0">Créer une Nouvelle Question</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('questions.store') }}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="title" class="form-label">Titre :</label>
                                <input type="text" name="title" id="title" class="form-control" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="description" class="form-label">Description :</label>
                                <textarea name="description" id="description" class="form-control" rows="3" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-success">Créer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
