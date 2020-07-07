<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['category_name',"category_description"];

    public function children()
    {
        return $this->hasMany('App\Category', 'parent_id');
    }
    public function questions()
    {
        return $this->hasMany('App\Questions');
    }
}
