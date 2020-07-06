<?php

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
        return $model = Question::class;
    }
}
