<?php

namespace App\Http\Services;

use App\Http\Repositories\QuizQuestionRepo;

class QuizQuestionService implements CRUDInterfaceService
{
    protected $quizQuesRepo;

    public function __construct(QuizQuestionRepo $quizQuesRepo)
    {
        $this->quizQuesRepo = $quizQuesRepo;
    }
    public function getAll()
    {
        $quizzes = $this->quizQuesRepo->getAll();

        return $quizzes;
    }

    public function findById($id)
    {
        $question = $this->quizQuesRepo->findById($id);

        if (!$question) {
            return 404;
        }

        return $question;
    }

    public function create($request)
    {
        $question = $this->quizQuesRepo->create($request);

        return $question;
    }

    public function update($id, $request)
    {
        $oldQuestion = $this->quizQuesRepo->findById($id);

        if (!$oldQuestion) {
            if (!$oldQuestion) {
                return 404;
            } else {
                return  $this->quizQuesRepo->update($request, $oldQuestion);
            }
        }
    }

    public function destroy($id)
    {
        $question = $this->quizQuesRepo->findById($id);

        if ($question) {
            return $this->quizQuesRepo->destroy($question);
        }

        return 404;
    }

    public function getQuestionsByQuizId($id)
    {
        return $this->quizQuesRepo->getQuestionsByQuizId($id);

    }
}
