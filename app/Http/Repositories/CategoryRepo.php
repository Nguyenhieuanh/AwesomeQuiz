<?php

namespace App\Http\Repositories;

use App\Http\Repositories\CRUDInterfaceRepo;
use App\Http\Repositories\Eloquent\EloquentRepo;
use App\Models\Category;

class CategoryRepo extends EloquentRepo implements CRUDInterfaceRepo
{
    public function getModel()
    {
        return Category::class;
    }
}
