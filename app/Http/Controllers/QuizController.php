<?php

namespace App\Http\Controllers;

use App\Quiz;
use Illuminate\Http\Request;
use App\Http\Services\QuizService;
use App\Http\Requests\QuizFormRequest;
use App\Http\Services\CategoryService;
use App\Http\Services\QuestionService;
use App\Http\Services\QuizQuestionService;

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
        $quizzes = Quiz::paginate(6);
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
        $question_id = [];
        foreach ($questions as $value) {
            $question_id[] = $value->id;
        }
        shuffle($question_id);
        $count = ($request->question_count > count($question_id)) ? count($question_id) : $request->question_count;

        for ($i = 0; $i < $count; $i++) {
            $data = [
                'quiz_id' => $quiz->id,
                'question_id' => $question_id[$i]
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
