<?php

namespace App\Http\Controllers;

use App\Http\Services\QuizQuestionService;
use App\Http\Services\QuizService;
use Illuminate\Http\Request;

class UserQuizController extends Controller
{
    protected $quizService;
    protected $quizQuestionService;

    public function __construct(QuizService $quizService, QuizQuestionService $quizQuestionService ) {
        $this->quizQuestionService = $quizQuestionService;
        $this->quizService = $quizService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $quizQuestions = $this->quizQuestionService->getQuestionsByQuizId($id);
        $quiz = $this->quizService->findById($id);
        return view('user_quiz.detail', compact('quiz', 'quizQuestions'));
    }

    public function doQuiz(Request $request)
    {
        dd($request->all());
    }
}
