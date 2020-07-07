<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateQuestionsRequest;
use App\Http\Requests\QuestionFormRequest;
use App\Http\Services\AnswerService;
use App\Http\Services\CategoryService;
use App\Http\Services\QuestionService;
use App\Models\Question;
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
        $questions = Question::paginate(10);
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

        $answerData1 = [
            'question_id' => $question->id,
            'answer_content' => $request->answer_option_1,
            'correct' => $request->correct_option_1,
        ];

        $answerData2 = [
            'question_id' => $question->id,
            'answer_content' => $request->answer_option_2,
            'correct' => $request->correct_option_2,
        ];

        $answerData3 = [
            'question_id' => $question->id,
            'answer_content' => $request->answer_option_3,
            'correct' => $request->correct_option_3,
        ];

        $answerData4 = [
            'question_id' => $question->id,
            'answer_content' => $request->answer_option_4,
            'correct' => $request->correct_option_4,
        ];

        $answerOption1 = $this->answerService->create($answerData1);
        $answerOption2 = $this->answerService->create($answerData2);
        $answerOption3 = $this->answerService->create($answerData3);
        $answerOption4 = $this->answerService->create($answerData4);

        return redirect()->route('question.index');
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
