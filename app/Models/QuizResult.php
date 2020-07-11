<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuizResult extends Model
{
    protected $fillable = [
        'user_id', 'quiz_id', 'question_id', 'answer_id', 'correct', 'answered', 'user_quiz_id'
    ];

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

    public function answer()
    {
        return $this->belongsTo('App\Models\Answer');
    }

    public function userQuiz()
    {
        return $this->belongsTo('App\Models\UserQuiz');
    }
}
