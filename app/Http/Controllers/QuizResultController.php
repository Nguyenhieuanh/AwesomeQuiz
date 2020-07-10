<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\QuizResultService;
use App\Http\Services\UserQuizService;

class QuizResultController extends Controller
{
    protected $quizResultService;
    protected $userQuizService;

    public function __construct(
        QuizResultService $quizResultService,
        UserQuizService $userQuizService
    ) {
        $this->quizResultService = $quizResultService;
        $this->userQuizService = $userQuizService;
    }

    public function showResult($id)
    {
        $userQuiz = $this->userQuizService->findById($id);
        $questions = $userQuiz->quizResults->groupBy('question_id');
        $point = 0;
        $checkCorrect = false;
        foreach ($questions as $question) {
            foreach ($question as $item) {
                if ($item->correct != $item->answered) {
                    $checkCorrect = false;
                    break;
                }
                $checkCorrect = true;
            }
            if ($checkCorrect) {
                $point++;
            }
        };
        dd($point);
        return view('user_quiz.result');
    }
}
