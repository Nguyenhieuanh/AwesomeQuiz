<?php

namespace App\Http\Controllers;

use App\Http\Services\CategoryService;
use App\Http\Services\QuestionService;
use App\Http\Services\QuizService;
use App\Models\Category;
use App\Models\Question;
use App\User;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    protected $quizService;
    protected $categoryService;
    protected $questionService;
    /**
     * @var UserController
     */
    protected $userController;

    public function __construct(QuizService $quizService,CategoryService $categoryService, QuestionService $questionService, UserController $userController)
    {
        $this->userController = $userController;
        $this->questionService = $questionService;
        $this->categoryService = $categoryService;
        $this->quizService = $quizService;
    }


    public function index()
    {
        $userController = User::paginate(3);
        $questions = $this->questionService->latest();
        $categories = $this->categoryService->latest();
        $quizzes = $this->quizService->getAll();
        $latestQuiz = $this->quizService->latest();
        return view('welcome', compact('quizzes','categories','questions','userController', 'latestQuiz'));
    }
}
