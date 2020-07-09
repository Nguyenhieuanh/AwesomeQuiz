<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $fillable = [
        'name', 'duration', 'question_count', 'category_id'
    ];

    public function quizQuestions()
    {
        return $this->hasMany('App\Models\QuizQuestion');
    }

    public function quizResult()
    {
        return $this->hasMany('App\Models\QuizResult');
    }
}
