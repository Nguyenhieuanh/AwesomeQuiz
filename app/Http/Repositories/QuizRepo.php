<?php

namespace App\Http\Repositories;

use App\Models\Quiz;
use App\Http\Repositories\CRUDInterfaceRepo;
use App\Http\Repositories\Eloquent\EloquentRepo;
use Illuminate\Support\Facades\DB;

class QuizRepo extends EloquentRepo implements CRUDInterfaceRepo
{
    public function getModel()
    {
        return Quiz::class;
    }

    public function latest()
    {
        return DB::table('quizzes')->latest('id')->first();
    }
}
