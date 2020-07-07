<?php

namespace App\Http\Services;

use App\Http\Repositories\CategoryRepo;

class CategoryService implements CRUDInterfaceService
{
    protected $categoryRepo;

    public function __construct(CategoryRepo $categoryRepo)
    {
        $this->categoryRepo = $categoryRepo;
    }
    public function getAll()
    {
        $quizzes = $this->categoryRepo->getAll();

        return $quizzes;
    }

    public function findById($id)
    {
        $quiz = $this->categoryRepo->findById($id);

        if (!$quiz) {
            return 404;
        }

        return $quiz;
    }

    public function create($request)
    {
        $quiz = $this->categoryRepo->create($request);

        return $quiz;
    }

    public function update($id, $request)
    {
        $oldQuiz = $this->categoryRepo->findById($id);

        if (!$oldQuiz) {
            if (!$oldQuiz) {
                return 404;
            } else {
                return  $this->categoryRepo->update($request, $oldQuiz);
            }
        }
    }

    public function destroy($id)
    {
        $quiz = $this->categoryRepo->findById($id);

        if ($quiz) {
            return $this->categoryRepo->destroy($id);
        }

        return 404;
    }
}
