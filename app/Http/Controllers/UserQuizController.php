<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\QuizService;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\UserQuizService;
use App\Http\Services\QuizQuestionService;
use App\Http\Services\QuizResultService;

class UserQuizController extends Controller
{
    protected $quizService;
    protected $quizQuestionService;
    protected $userQuizService;
    protected $quizResultService;

    public function __construct(
        QuizService $quizService,
        QuizQuestionService $quizQuestionService,
        UserQuizService $userQuizService,
        QuizResultService $quizResultService
    ) {
        $this->quizResultService = $quizResultService;
        $this->quizQuestionService = $quizQuestionService;
        $this->quizService = $quizService;
        $this->userQuizService = $userQuizService;
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
        return redirect()->route('quiz.result');
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $duration = $request->duration;
        $now = time();
        $ten_minutes = $now + ($duration * 60);
        $start_time = date('Y-m-d H:i:s', $now);
        $end_time = date('Y-m-d H:i:s', $ten_minutes);

        $userQuizData = [
            'user_id' => Auth::id(),
            'quiz_id' => $request->quiz_id,
            'start_time' => $start_time,
            'end_time' => $end_time,
            'finished' => 1
        ];

        $this->userQuizService->create($userQuizData);

        $question_id = $request->question_id;
        $answer_id = $request->answer_id;
        $question_id = $request->question_id;
        $correct = $request->correct;
        $answered = $request->answered;

        for ($i = 0; $i < count($question_id); $i++) {
            $quizResultData = [
                'user_id' => Auth::id(),
                'quiz_id' => $request->quiz_id,
                'question_id' => $question_id[$i],
                'answer_id' => $answer_id[$i],
                'correct' => $correct[$i],
                'answered' => $answered[$i]
            ];

            $this->quizResultService->create($quizResultData);
        }

        alert("Success", "Done", "success")->autoClose(2000);

        return redirect()->route('quiz.result');
    }
}
