<?php

namespace App\Http\Repositories;

use App\Http\Repositories\Eloquent\EloquentRepo;
use App\Quiz;

class QuizRepo extends EloquentRepo implements CRUDInterfaceRepo
{
    public function getModel()
    {
        return $model = Quiz::class;
    }
}
