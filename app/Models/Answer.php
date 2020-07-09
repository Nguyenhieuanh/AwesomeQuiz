<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $table = "answers";

    protected $fillable = [
        "answer_content",
        "question_id",
        "correct"
    ];

    public function question()
    {
        return $this->belongsTo('App\Models\Question');
    }

    public function quizResults()
    {
        return $this->hasMany('App\Models\QuizResult');
    }
}
