<?php

namespace App\Http\Services;

use App\Http\Repositories\QuizResultRepo;

class QuizResultService implements CRUDInterfaceService
{
    protected $quizResultRepo;

    public function __construct(QuizResultRepo $quizResultRepo)
    {
        $this->quizResultRepo = $quizResultRepo;
    }
    public function getAll()
    {
        return $this->quizResultRepo->getAll();
    }

    public function findById($id)
    {
        $quizResult = $this->quizResultRepo->findById($id);

        return (!$quizResult ? abort(404) : $quizResult);
    }

    public function create($request)
    {
        return $this->quizResultRepo->create($request);
    }

    public function update($id, $request)
    {
        $oldQuizResult = $this->quizResultRepo->findById($id);

        return (!$oldQuizResult ? abort(404) : $this->quizResultRepo->update($request, $oldQuizResult));
    }

    public function destroy($id)
    {
        $quizResult = $this->quizResultRepo->findById($id);

        return ($quizResult ? $this->quizResultRepo->destroy($quizResult) : abort(404));
    }
}
