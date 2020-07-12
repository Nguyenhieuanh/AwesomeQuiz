<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\UserQuizService;
use App\Http\Services\QuizResultService;

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

    public function showResult($id, $userId)
    {
        if ($userId == Auth::id() || Auth::user()->role != 0) {
            $userQuiz = $this->userQuizService->findById($id);
            $questions = $userQuiz->quizResults->groupBy('question_id');
            // dd($questions);
            $point = 0;
            $checkCorrect = false;
            foreach ($questions as $question) {
                foreach ($question as $item) {
                    if ($item->correct != $item->answered) {
                        $checkCorrect = false;
                        break;
                    } else {
                        $checkCorrect = true;
                    }
                }
                if ($checkCorrect) {
                    $point++;
                }
            };
            $questions_count = $questions->count();
            return view('user_quiz.result', compact('point', 'questions_count', 'questions', 'userQuiz'));
        } else {
            abort(403);
        }
    }

    public function showUserResults($userId)
    {
        $user = User::find($userId);
        $userQuizzes = $user->userQuizzes;

        return
        (Auth::id() == $userId || Auth::user()->role != 0) ?
        view('user_quiz.statistical', compact('user', 'userQuizzes')) :
        abort(403);
    }
}
