<?php
namespace App\Http\Repositories;

use App\Models\Question;

use App\Http\Repositories\CRUDInterfaceRepo;
use App\Http\Repositories\Eloquent\EloquentRepo;

class QuestionRepo extends EloquentRepo implements CRUDInterfaceRepo
{
    /**
     * get Model
     * @return string
     */
    public function getModel()
    {
        return Question::class;
    }

    public function getQuestionsByCategoryId($category_id)
    {
        return Question::where('category_id',$category_id)->get();
    }
}
