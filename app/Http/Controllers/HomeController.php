<?php

namespace App\Http\Controllers;

use App\Http\Services\CategoryService;
use App\Http\Services\QuestionService;
use App\Http\Services\QuizService;
use App\Models\Category;
use App\Models\Question;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $quizService;
    protected $categoryService;
    protected $questionService;

    public function __construct(QuizService $quizService,CategoryService $categoryService, QuestionService $questionService)
    {
        $this->questionService = $questionService;
        $this->categoryService = $categoryService;
        $this->quizService = $quizService;
        $this->middleware('auth');
    }


    public function index()
    {
        $questions = Question::paginate(3);
        $categories = Category::paginate(3);
        $quizzes = $this->quizService->getAll();
        return view('home', compact('quizzes','categories','questions'));
    }
}
