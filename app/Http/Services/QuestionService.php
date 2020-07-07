<?php

namespace App\Http\Services;


use App\Http\Repositories\QuestionRepo;
use App\Http\Services\CRUDInterfaceService;


class QuestionService implements CRUDInterfaceService
{
    protected $questionRepo;

    public function __construct(QuestionRepo $questionRepo)
    {
        $this->questionRepo = $questionRepo;
    }

    public function getAll()
    {
        $questions = $this->questionRepo->getAll();

        return $questions;
    }

    public function findById($id)
    {
        $question = $this->questionRepo->findById($id);

        $statusCode = 200;
        if (!$question)
            $statusCode = 404;

        $data = [
            'statusCode' => $statusCode,
            'questions' => $question
        ];

        return $data;
    }

    public function create($request)
    {
        $question = $this->questionRepo->create($request->all());

        if (!$question)
            abort(500);

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


        if ($question) {
            $this->questionRepo->destroy($question);
            $message = "Delete success!";
        } else {
            abort(404, 'User Not Found');
        };

        return $message;
    }

    public function getQuestionsByCategoryId($category_id)
    {
        return $this->questionRepo->getQuestionsByCategoryId($category_id);
    }
}
