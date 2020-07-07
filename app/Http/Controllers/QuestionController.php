<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Services\CategoryService;
use App\Http\Services\QuestionService;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    protected $questionService;
    protected $categoryService;

    public function __construct(QuestionService $questionService, CategoryService $categoryService)
    {
        $this->questionService = $questionService;
        $this->categoryService = $categoryService;
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
        $this->questionService->create($request);
        // return redirect('question.index',201);
    }
}
