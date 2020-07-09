<?php

namespace App\Http\Repositories;

use App\Models\UserQuiz;
use App\Http\Repositories\Eloquent\EloquentRepo;

class UserQuizRepo extends EloquentRepo implements CRUDInterfaceRepo
{
    public function getModel()
    {
        return UserQuiz::class;
    }
}
