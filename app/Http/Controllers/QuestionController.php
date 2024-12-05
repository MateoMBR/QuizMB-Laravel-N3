<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::all(); // ou selon vos besoins
        return view('questions.index', compact('questions'));
    }

    public function welcome()
    {
        $questions = Question::with('reponses')->get();
        return view('welcome', compact('questions'));
    }

    public function create()
    {
        return view('questions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable'
        ]);

        Question::create($request->all());
        return redirect()->route('questions.index');
    }

    public function show($id)
    {
        $question = Question::with('reponses')->findOrFail($id);
        return view('questions.show', compact('question'));
    }

    public function edit($id)
    {
        $question = Question::findOrFail($id);
        return view('questions.edit', compact('question'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable'
        ]);

        $question = Question::findOrFail($id);
        $question->update($request->all());

        return redirect()->route('questions.index');
    }

    public function destroy($id)
    {
        // Récupérer la question en fonction de l'identifiant
        $question = Question::findOrFail($id);

        // Supprimer la question
        $question->delete();

        // Rediriger vers l'index des questions
        return redirect()->route('questions.index');
    }
}
