<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "categories";

    protected $fillable = [
        "category_name",
        "category_description"
    ];

    public function questions()
    {
        return $this->hasMany('App\Models\Question');
    }

    public function quizzes()
    {
        return $this->hasMany('App\Models\Quiz');
    }

}
