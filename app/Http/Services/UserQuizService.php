<?php

namespace App\Http\Services;

use App\Http\Repositories\UserQuizRepo;

class UserQuizService
{
    protected $userQuizRepo;

    public function __construct(UserQuizRepo $userQuizRepo)
    {
        $this->userQuizRepo = $userQuizRepo;
    }
    public function getAll()
    {
        return $this->userQuizRepo->getAll();
    }

    public function findById($id)
    {
        $userQuiz = $this->userQuizRepo->findById($id);

        return (!$userQuiz ? abort(404) : $userQuiz);
    }

    public function create($request)
    {
        return $this->userQuizRepo->create($request);
    }

    public function update($id, $request)
    {
        $oldUserQuiz = $this->userQuizRepo->findById($id);

        if (!$oldUserQuiz) {
            if (!$oldUserQuiz) {
                abort(404);
            } else {
                return  $this->quizRepo->update($request, $oldUserQuiz);
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
