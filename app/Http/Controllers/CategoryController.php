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
        $categories = Category::paginate(10);

        return view('categories.index', compact('categories'));
    }


    public function create()
    {
        return view('categories.create');
    }


    public function store(StoreCategoriesRequest $request)
    {
        $question = $this->categoryService->create($request->all());
        if(!$question){
            alert()->error('Create category error', 'Error')->showConfirmButton('OK');
            return redirect()->route('categories.create');
        };
        alert()->success('Category created', 'Successfully')->autoClose(1800);
        return redirect()->route('categories.create');
    }

    public function edit($id)
    {
        $category = $this->categoryService->findById($id);

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
        if ($this->categoryService->isUsedCategoryInQuestionTable($id) || $this->categoryService->isUsedCategoryInQuizTable($id)) {
            alert()->warning('Delete unavailable!', 'Category already has Questions or Quizzes.')->showConfirmButton('Understood!');
        } else {
            $this->categoryService->destroy($id);
            alert()->success('Delete completed', 'Successfully')->autoClose(1800);
        }

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
