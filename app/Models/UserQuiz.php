<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserQuiz extends Model
{
    protected $fillable = [
        'user_id', 'quiz_id', 'start_time', 'end_time',  'finished'
    ];

    public function Users()
    {
        return $this->belongsToMany('App\User');
    }

    public function Quizzes()
    {
        return $this->belongsToMany('App\Models\Quiz');
    }

    public function quizResults()
    {
        return $this->hasMany('App\Models\QuizResult');
    }
}
