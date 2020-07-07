<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuestionFormRequest;
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

    public function store(QuestionFormRequest $request)
    {
        $question = $this->questionService->create($request->all());

        $correctData = [
            'question_id' => $question->id,
            'answer_content' => $request->correct_answer,
            'correct' => 1
        ];
        $answerData1 = [
            'question_id' => $question->id,
            'answer_content' => $request->answer_option1,
        ];
        $answerData2 = [
            'question_id' => $question->id,
            'answer_content' => $request->answer_option2,
        ];
        $answerData3 = [
            'question_id' => $question->id,
            'answer_content' => $request->answer_option3,
        ];
        $correctAnswer = $this->answerService->create($correctData);
        $answerOption1 = $this->answerService->create($answerData1);
        $answerOption2 = $this->answerService->create($answerData2);
        $answerOption3 = $this->answerService->create($answerData3);

        return redirect()->route('question.index');
    }
}
