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
        $this->belongsTo('App\Quiz');
    }

    public function question ()
    {
        $this->hasOne('App\Models\Question');
    }
}
