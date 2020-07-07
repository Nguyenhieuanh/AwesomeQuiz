<?php

namespace App\Http\Repositories;

use App\Quiz;
use App\Http\Repositories\CRUDInterfaceRepo;
use App\Http\Repositories\Eloquent\EloquentRepo;

class QuizRepo extends EloquentRepo implements CRUDInterfaceRepo
{
    public function getModel()
    {
        return $model = Quiz::class;
    }
}
