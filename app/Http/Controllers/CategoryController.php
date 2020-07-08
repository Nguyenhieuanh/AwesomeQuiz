<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoriesRequest;
use App\Http\Requests\UpdateCategoriesRequest;
use Illuminate\Http\Request;
use App\Category;
use App\Http\Services\CategoryService;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
        $this->middleware('auth');
    }

    public function index()
    {
        $categories = Category::paginate(5);

        return view('categories.index', compact('categories'));
    }


    public function create()
    {
        return view('categories.create');
    }


    public function store(StoreCategoriesRequest $request)
    {
        Category::create($request->all());
        alert()->success('Category created', 'Successfully')->autoClose(1800);


        return redirect()->route('categories.index');
    }


    public function edit($id)
    {
        $category = Category::findOrFail($id);

        return view('categories.edit', compact('category'));
    }


    public function update(UpdateCategoriesRequest $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->update($request->all());
        alert()->success('Category updated', 'Successfully')->autoClose(1800);

        return redirect()->route('categories.index');
    }


    public function show($id)
    {
        $category = Category::findOrFail($id);

        return view('categories.show', compact('category'));
    }


    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        alert()->success('Delete completed', 'Successfully')->autoClose(1800);


        return redirect()->route('categories.index');
    }

    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = Category::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
