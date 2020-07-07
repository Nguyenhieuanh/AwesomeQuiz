<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\QuizQuestionService;

class QuizQuestionController extends Controller
{
    protected $quizQuestionService;

    public function __construct(QuizQuestionService $quizQuestionService)
    {
        $this->quizQuestionService = $quizQuestionService;
    }

    public function create($data, $count)
    {
        // for ($i; )
    }
}
