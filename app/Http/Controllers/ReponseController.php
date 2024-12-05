<?php

namespace App\Http\Controllers;

use App\Models\Reponse;
use App\Models\Question;
use Illuminate\Http\Request;

class ReponseController extends Controller
{
    public function index()
    {
        $reponses = Reponse::with('question')->get();
        return view('reponses.index', compact('reponses'));
    }

    public function create($questionId)
    {
        // Récupérer la question spécifique
        $question = Question::findOrFail($questionId);

        // Passer la question à la vue
        return view('reponses.create', compact('question'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required',
            'question_id' => 'required|exists:questions,id',
            'is_correct' => 'required|boolean'
        ]);

        Reponse::create($request->all());
        return redirect('/questions');
    }

    public function show(Reponse $reponse)
    {
        return view('reponses.show', compact('reponse'));
    }

    public function edit(Reponse $reponse)
    {
        $questions = Question::all();
        return view('reponses.edit', compact('reponse', 'questions'));
    }

    public function update(Request $request, Reponse $reponse)
    {
        $request->validate([
            'content' => 'required',
            'question_id' => 'required|exists:questions,id',
            'is_correct' => 'required|boolean'
        ]);

        $reponse->update($request->all());
        return redirect()->route('questions.index');
    }

    public function destroy(Reponse $reponse)
    {
        $reponse->delete();
        return redirect()->route('questions.index');
    }
}
