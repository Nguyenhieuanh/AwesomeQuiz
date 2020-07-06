<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuizQuestion extends Model
{
    protected $fillable = [
        'quiz_id', 'question_id'
    ];

    public function quiz()
    {
        return $this->belongsTo('App\Quiz');
    }

    public function question ()
    {
        return $this->belongsTo('App\Models\Question');
    }
}
