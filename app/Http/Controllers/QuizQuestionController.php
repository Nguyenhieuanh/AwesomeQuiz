<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\QuizQuestionService;
use App\Http\Services\QuizService;

class QuizQuestionController extends Controller
{
    protected $quizQuestionService;
    protected $quizService;

    public function __construct(QuizQuestionService $quizQuestionService, QuizService $quizService)
    {
        $this->quizService = $quizService;
        $this->quizQuestionService = $quizQuestionService;
    }

    public function store(Request $request)
    {
        $quiz_id = $request->quiz_id;
        $question_id_exist = $this->quizService->findById($quiz_id)->quizQuestions;
        $question_id = $request->question_id;
        for ($i = 0; $i < count($question_id); $i++) {
            for ($j = 0; $j < count($question_id_exist); $j++) {
                if ($question_id[$i] === $question_id_exist[$j]->id) {
                    break;
                }
            }
            $data = [
                'quiz_id' => $request->quiz_id,
                'question_id' => $question_id[$i]
            ];
            $this->quizQuestionService->create($data);
        }
        return redirect()->back();
    }

    public function destroy($id)
    {
        $this->quizQuestionService->destroy($id);

        return redirect()->back();
    }

    public function multiDestroy(Request $request)
    {
        $id = $request->question_id;

        if (empty($id)) {
            return redirect()->back();
        }
        for ($i = 0; $i < count($id); $i++) {
            $this->quizQuestionService->destroy($id[$i]);
        }

        return redirect()->back();
    }
}
