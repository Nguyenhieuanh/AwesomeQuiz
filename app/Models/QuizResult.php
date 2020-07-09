<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuizResult extends Model
{
    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    public function quizzes()
    {
        $this->belongsToMany('App\Models\Quiz');
    }

    public function questions()
    {
        return $this->belongsToMany('App\Models\Question');
    }

    public function answers()
    {
        return $this->belongsToMany('App\Models\Answer');
    }
}
