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
        $question = $this->questionRepo->create($request);

        $statusCode = 201;
        if (!$question)
            $statusCode = 500;

        $data = [
            'statusCode' => $statusCode,
            'questions' => $question
        ];

        return $data;
    }

    public function update($request, $id)
    {
        $oldQuestion = $this->questionRepo->findById($id);

        if (!$oldQuestion) {
            $newQuestion = null;
            $statusCode = 404;
        } else {
            $newQuestion = $this->questionRepo->update($request, $oldQuestion);
            $statusCode = 200;
        }

        $data = [
            'statusCode' => $statusCode,
            'questions' => $newQuestion
        ];
        return $data;
    }

    public function destroy($id)
    {
        $question = $this->questionRepo->findById($id);

        $statusCode = 404;
        $message = "User not found";
        if ($question) {
            $this->questionRepo->destroy($question);
            $statusCode = 200;
            $message = "Delete success!";
        }

        $data = [
            'statusCode' => $statusCode,
            'message' => $message
        ];
        return $data;
    }

    public function getQuestionsByCategoryId($category_id)
    {
        return $this->questionRepo->getQuestionsByCategoryId($category_id);
    }
}
