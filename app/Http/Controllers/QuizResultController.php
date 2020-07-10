<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\QuizResultService;

class QuizResultController extends Controller
{
    protected $quizResultService;

    public function __construct(QuizResultService $quizResultService) {
        $this->quizResultService = $quizResultService;
    }

    public function showResult()
    {
        return view('user_quiz.result');
    }
}
