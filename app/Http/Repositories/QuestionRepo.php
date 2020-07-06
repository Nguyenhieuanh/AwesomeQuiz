<?php
use App\Http\Repositories\CRUDInterface;

use App\Http\Repositories\Eloquent\EloquentRepo;
use App\Models\Question;

class QuestionRepo extends EloquentRepo implements CRUDInterface
{
    /**
     * get Model
     * @return string
     */
    public function getModel()
    {
        return $model = Question::class;
    }
}

