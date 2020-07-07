<?php

namespace App\Http\Controllers;

use App\Http\Services\CategoryService;
use App\Http\Services\QuizService;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $quizService;
    /**
     * @var CategoryService
     */
    protected $categoryService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(QuizService $quizService,CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
        $this->quizService = $quizService;
        $this->middleware('auth');
    }


    public function index()
    {
        $categories = Category::paginate(3);
        $quizzes = $this->quizService->getAll();
        return view('home', compact('quizzes','categories'));
    }
}
