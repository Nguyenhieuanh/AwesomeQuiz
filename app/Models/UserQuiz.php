<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserQuiz extends Model
{
    protected $fillable = [
        'user_id', 'quiz_id', 'start_time', 'end_time',  'finished'
    ];

    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    public function quiz()
    {
        return $this->belongsTo('App\Models\Quiz');
    }

    public function quizResults()
    {
        return $this->hasMany('App\Models\QuizResult');
    }
}
