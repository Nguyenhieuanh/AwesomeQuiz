<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateQuestionsRequest;
use App\Http\Services\QuestionService;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    protected $questionService;

    public function __construct(QuestionService $questionService)
    {
        $this->questionService = $questionService;
        $this->middleware('auth');
    }

    public function index()
    {
        $questions = $this->questionService->getAll();
        return view('question.index', compact('questions'));
    }

    public function create()
    {
        return view('question.create');
    }

    public function show($id)
    {
        $question = $this->questionService->findById($id);
        return view('question.detail', compact('question'));
    }
    public function edit($id)
    {
        $question = Question::findOrFail($id);

        return view('question.edit', compact('question'));
    }


    public function update(UpdateQuestionsRequest $request, $id)
    {
        $question = Question::findOrFail($id);
        $question->update($request->all());

        return redirect()->route('question.index');
    }
}
