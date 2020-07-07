<?php

namespace App\Http\Services;

use App\Http\Repositories\AnswerRepo;
use App\Http\Services\CRUDInterfaceService;

class AnswerService implements CRUDInterfaceService
{
    protected $answerRepo;

    public function __construct(AnswerRepo $answerRepo)
    {
        $this->answerRepo = $answerRepo;
    }

    public function getAll()
    {
        $answers = $this->answerRepo->getAll();

        return $answers;
    }

    public function findById($id)
    {
        $answer = $this->answerRepo->findById($id);

        if (!$answer)
            abort(404, "Not found");

        return $answer;
    }

    public function create($request)
    {
        if ($request['correct'] == null) {
            $request['correct'] = 0;
        };

        $answer = $this->answerRepo->create($request);

        return $answer;
    }

    public function update($request, $id)
    {
        $oldAnswer = $this->answerRepo->findById($id);

        if (!$oldAnswer) {
            $newAnswer = null;
            abort(404);
        } else {
            $newAnswer = $this->answerRepo->update($request, $oldAnswer);
        }

        return $newAnswer;
    }

    public function destroy($id)
    {
        $answer = $this->answerRepo->findById($id);

        if ($answer) {
            $this->answerRepo->destroy($id);
            $message = "Delete success!";
        } else {
            abort(404, 'User Not Found');
        };

        return $message;
    }

    public function getAnswerByQuestionId($question_id)
    {
        return $this->answerRepo->getAnswerByQuestionId($question_id);
    }
}
