<?php

namespace App\Http\Repositories;

use App\Models\Quiz;
use App\Http\Repositories\CRUDInterfaceRepo;
use App\Http\Repositories\Eloquent\EloquentRepo;
use App\Models\QuizQuestion;

class QuizQuestionRepo extends EloquentRepo implements CRUDInterfaceRepo
{
    public function getModel()
    {
        return QuizQuestion::class;
    }

    public function getQuestionsByQuizId($id)
    {
        return QuizQuestion::where('quiz_id', $id)->get();
    }

}
