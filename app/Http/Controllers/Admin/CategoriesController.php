<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }


    public function create()
    {
        return view('admin.categories.create');
    }


    public function store(CategoryRequest $request)
    {
        Category::create($request->all());
        return redirect()->route('admin.categories.index');
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.categories.edit', compact('category'));
    }

    public function update(CategoryRequest $request, $id)
    {
        $category = Category::find($id);
        $category->update($request->all());
       return redirect()->route('admin.categories.index');
    }

    public function destroy($id)
    {
        Category::find($id)->delete();
        return redirect()->route('admin.categories.index');
    }


}
