<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = "questions";

    protected $fillable = [
        "question_content"
    ];

    public function answers()
    {
        return $this->hasMany('App\Models\Answer');
    }

    public function categories()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function quizQuestion()
    {
        $this->belongsTo('App\Models\QuizQuestion');
    }
}
