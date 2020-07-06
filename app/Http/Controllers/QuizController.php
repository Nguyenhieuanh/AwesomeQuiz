<?php

namespace App\Http\Controllers;

use App\Http\Repositories\CategoryRepo;
use App\Http\Requests\QuizFormRequest;
use App\Http\Services\CategoryService;
use App\Http\Services\QuestionService;
use App\Http\Services\QuizQuestionService;
use App\Http\Services\QuizService;
use App\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class QuizController extends Controller
{
    protected $quizService;
    protected $categoryService;
    protected $quizQuestionService;
    protected $questionService;

    public function __construct(
        QuizService $quizService,
        CategoryService $categoryService,
        QuizQuestionService $quizQuestionService,
        QuestionService $questionService
    ) {
        $this->quizService = $quizService;
        $this->categoryService = $categoryService;
        $this->quizQuestionService = $quizQuestionService;
        $this->questionService = $questionService;
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quizzes = $this->quizService->getAll();
        return view('quizzes.list', compact('quizzes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->categoryService->getAll();
        return view('quizzes.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuizFormRequest $request)
    {
        $quiz = $this->quizService->create($request->all());
        $questions = $this->questionService->getQuestionsByCategoryId($quiz->category_id);
        $array = [];
        foreach ($questions as $value) {
            $array[] = $value->id;
        }
        for ($i = 0; $i < $request->question_count; $i++) {
            $data = [
                'quiz_id' => $quiz->id,
                'question_id' => $questions[array_rand($array)]->id
            ];
            $this->quizQuestionService->create($data);
        }

        return redirect()->route('quiz.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $quiz_questions = $this->quizQuestionService->getQuestionsByQuizId($id);
        $quiz = $this->quizService->findById($id);
        return view('quizzes.detail', compact('quiz', 'quiz_questions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
