<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Services\AnswerService;
use App\Http\Services\CategoryService;
use App\Http\Services\QuestionService;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    protected $questionService;
    protected $categoryService;
    protected $answerService;

    public function __construct(
        QuestionService $questionService,
        CategoryService $categoryService,
        AnswerService $answerService
    ) {
        $this->questionService = $questionService;
        $this->categoryService = $categoryService;
        $this->answerService = $answerService;
        $this->middleware('auth');
    }

    public function index()
    {
        $questions = $this->questionService->getAll();
        return view('question.index', compact('questions'));
    }

    public function create()
    {
        $categories = $this->categoryService->getAll();
        return view('question.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $question = $this->questionService->create($request->all());
        $correctData = [
            'question_id' => $question->id,
            'answer_content' => $request->correct_answer,
            'correct' => 1
        ];
        $correctAnswer = $this->answerService->create($correctData);

        return redirect()->route('question.index');
    }
}
