<?php

namespace App\Http\Services;

use App\Http\Repositories\QuizRepo;

class QuizService implements CRUDInterfaceService
{
    protected $quizRepo;

    public function __construct(QuizRepo $quizRepo)
    {
        $this->quizRepo = $quizRepo;
    }
    public function getAll()
    {
        $quizzes = $this->quizRepo->getAll();

        return $quizzes;
    }

    public function findById($id)
    {
        $quiz = $this->quizRepo->findById($id);

        if (!$quiz) {
            return 404;
        }

        return $quiz;
    }

    public function create($request)
    {
        $quiz = $this->quizRepo->create($request);
//        dd($request);
        return $quiz;
    }

    public function update($id, $request)
    {
        $oldQuiz = $this->quizRepo->findById($id);

        return (!$oldQuiz ? abort(404) : $this->quizRepo->update($request, $oldQuiz));
    }

    public function destroy($id)
    {
        $quiz = $this->quizRepo->findById($id);

        return ($quiz ? $this->quizRepo->destroy($quiz) : abort(404));
    }


    public function latest()
    {
        return $this->quizRepo->latest();
    }
}
