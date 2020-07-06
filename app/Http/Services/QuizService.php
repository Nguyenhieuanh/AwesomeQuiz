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

        return $quiz;
    }

    public function update($id, $request)
    {
        $oldQuiz = $this->quizRepo->findById($id);

        if (!$oldQuiz) {
            if (!$oldQuestion) {

                return 404;
            } else {
                return  $this->questionRepo->update($request, $oldQuestion);
            }
        }
    }

    public function destroy($id)
    {
        $quiz = $this->quizRepo->findById($id);

        if ($quiz) {
            return $this->quizRepo->destroy($quiz);
        }

        return 404;
    }
}
