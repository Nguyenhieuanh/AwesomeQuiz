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
//                dd($oldQuestion);
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
            $this->questionRepo->destroy($id);
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
