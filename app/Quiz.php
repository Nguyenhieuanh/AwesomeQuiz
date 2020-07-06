<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $fillable = [
        'name', 'duration', 'question_count', 'category_id'
    ];

    public function quizQuestions()
    {
        $this->hasMany('App\Models\QuizQuestion');
    }

}
