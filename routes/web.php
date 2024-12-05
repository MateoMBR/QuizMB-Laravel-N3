<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ReponseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;

// Routes accessibles à tout le monde
Route::get('/', [QuestionController::class, 'welcome'])->name('home');

// Routes nécessitant une authentification
Route::middleware(['auth'])->group(function () {
    Route::get('/questions/create', [QuestionController::class, 'create'])->name('questions.create');
    Route::post('/questions', [QuestionController::class, 'store'])->name('questions.store');
    Route::get('/questions/{id}/edit', [QuestionController::class, 'edit'])->name('questions.edit');
    Route::put('/questions/{id}', [QuestionController::class, 'update'])->name('questions.update');
    Route::delete('/questions/{id}', [QuestionController::class, 'destroy'])->name('questions.destroy');

    Route::get('/reponses/create/{question}', [ReponseController::class, 'create'])->name('reponses.create');
    Route::post('/reponses/store', [ReponseController::class, 'store'])->name('reponses.store');
    Route::get('/reponses', [ReponseController::class, 'index'])->name('reponses.index');
    Route::get('/reponses/{reponse}/edit', [ReponseController::class, 'edit'])->name('reponses.edit');
    Route::put('/reponses/{reponse}', [ReponseController::class, 'update'])->name('reponses.update');
    Route::delete('/reponses/{reponse}', [ReponseController::class, 'destroy'])->name('reponses.destroy');
});

Route::get('/questions', [QuestionController::class, 'index'])->name('questions.index');
Route::get('/questions/{id}', [QuestionController::class, 'show'])->name('questions.show');



// Exemple de route vers le tableau de bord qui pourrait être protégée pour les utilisateurs connectés
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

// Route pour le profil de l'utilisateur, accessible uniquement si connecté
Route::middleware(['auth'])->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route pour le système d'authentification de Laravel (généralement ajouté par `php artisan ui vue --auth`)
require __DIR__.'/auth.php';
