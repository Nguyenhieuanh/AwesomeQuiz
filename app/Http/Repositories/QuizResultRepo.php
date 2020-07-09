<?php

namespace App\Http\Repositories;

use App\Http\Repositories\Eloquent\EloquentRepo;
use App\Models\QuizResult;

class QuizResultRepo extends EloquentRepo implements CRUDInterfaceRepo
{
    public function getModel()
    {
        return QuizResult::class;
    }
}
