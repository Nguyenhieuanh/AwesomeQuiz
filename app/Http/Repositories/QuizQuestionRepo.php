<?php

namespace App\Http\Repositories;

use App\Quiz;
use App\Http\Repositories\CRUDInterfaceRepo;
use App\Http\Repositories\Eloquent\EloquentRepo;
use App\Models\QuizQuestion;

class QuizQuestionRepo extends EloquentRepo implements CRUDInterfaceRepo
{
    public function getModel()
    {
        return $model = QuizQuestion::class;
    }
    
}
