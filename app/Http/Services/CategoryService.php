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
        return $this->categoryRepo->getAll();

    }

    public function findById($id)
    {
        $category = $this->categoryRepo->findById($id);

        if (!$category) {
            return 404;
        }

        return $category;
    }

    public function create($request)
    {
        return $this->categoryRepo->create($request);
    }

    public function update($id, $request)
    {
        $oldCategory = $this->categoryRepo->findById($id);

        if (!$oldCategory) {
            if (!$oldCategory) {
                return 404;
            } else {
                return  $this->categoryRepo->update($request, $oldCategory);
            }
        }
    }

    public function destroy($id)
    {
        $category = $this->categoryRepo->findById($id);

        if ($category) {
            return $this->categoryRepo->destroy($id);
        }

        return 404;
    }

    public function isUsedCategoryInQuestionTable($id)
    {
        $category = $this->categoryRepo->findById($id);
        return ($category->questions->first());
    }

    public function isUsedCategoryInQuizTable($id)
    {
        $category = $this->categoryRepo->findById($id);
        return ($category->quizzes->first());
    }
}
