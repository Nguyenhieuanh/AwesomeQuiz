<?php

namespace App\Http\Controllers;

use App\Http\Services\AnswerService;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    protected $answerService;

    public function __construct(AnswerService $answerService) {
        $this->answerService = $answerService;
    }
}
