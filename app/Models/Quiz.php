<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $fillable = [
        'name', 'duration', 'question_count', 'category_id', 'description'
    ];

    public function quizQuestions()
    {
        return $this->hasMany('App\Models\QuizQuestion');
    }

    public function userQuizzes()
    {
        return $this->hasMany('App\Models\UserQuiz');
    }

    public function quizResults()
    {
        return $this->hasMany('App\Models\QuizResult');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
