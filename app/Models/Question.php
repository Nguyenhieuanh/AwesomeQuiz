<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = "questions";

    protected $fillable = [
        "question_content",
        "difficulty"
    ];

    public function answers()
    {
        return $this->hasMany('App\Models\Answer');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function quizQuestion()
    {
        return $this->hasMany('App\Models\QuizQuestion');
    }
}
