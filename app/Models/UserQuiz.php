<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserQuiz extends Model
{
    public function Users()
    {
        return $this->belongsToMany('App\User');
    }

    public function Quizzes()
    {
        return $this->belongsToMany('App\Models\Quiz');
    }


}
