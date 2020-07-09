<?php

namespace App\Http\Services;

use App\Http\Repositories\AnswerRepo;
use App\Http\Repositories\QuestionRepo;
use App\Http\Services\CRUDInterfaceService;


class QuestionService implements CRUDInterfaceService
{
    protected $questionRepo;
    protected $answerRepo;

    public function __construct(QuestionRepo $questionRepo, AnswerRepo $answerRepo)
    {
        $this->questionRepo = $questionRepo;
        $this->answerRepo = $answerRepo;
    }

    public function getAll()
    {
        $questions = $this->questionRepo->getAll();

        return $questions;
    }

    public function findById($id)
    {
        $question = $this->questionRepo->findById($id);

        if (!$question)
            abort(404);

        return $question;
    }

    public function create($request)
    {
        $question = $this->questionRepo->create($request);

        return $question;
    }

    public function update($request, $id)
    {
        $oldQuestion = $this->questionRepo->findById($id);
        if (!$oldQuestion) {
            $newQuestion = null;
            abort(404);
        } else {
            $newQuestion = $this->questionRepo->update($request, $oldQuestion);
        }

        return $newQuestion;
    }

    public function destroy($id)
    {
        $question = $this->questionRepo->findById($id);
        $answers = $question->answers->all();
        if ($answers) {
            foreach ($answers as $key => $answer) {

            }
        }
        dd($answers, 2);

        if ($question) {
            return $this->questionRepo->destroy($id);
        };

        return 404;
    }

    public function getQuestionsByCategoryId($category_id)
    {
        return $this->questionRepo->getQuestionsByCategoryId($category_id);
    }
}
