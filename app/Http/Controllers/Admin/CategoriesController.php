<?php

namespace App\Http\Controllers\Admin;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
    public function store()
    {

    	Category::create(request()->validate([
    		'title' => ['required', 'min:3']
    	]));

    	return redirect('/admin/categories');
    }


	public function edit(Category $category)
    {

    	return view('admin.categories.edit', compact('category'));

    }
     public function update(Category $category)
    {
    
	/* 	$category->update(request(['title']));*/
		$category->update(request()->validate([
    		'title' => ['required', 'min:3']
    	]));
		return redirect('/admin/categories');
    }

	  public function destroy(Category $category)
    {
		$category->delete();

    	return redirect('/admin/categories');
    }

}

