<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuizQuestion extends Model
{
    protected $fillable = [
        'quiz_id', 'question_id'
    ];

    public function quizzes()
    {
        return $this->belongsToMany('App\Models\Quiz');
    }

    public function question ()
    {
        return $this->belongsTo('App\Models\Question');
    }
}
