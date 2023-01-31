<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Models\Models\Category;

class CategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
       $categories = category::all();
       return view('admin.categories.index', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
       // dd( \App\Models\Models\Category::all());

       $newCategory = new Category();
       $newCategory->name  = $request->name;
       $newCategory->save();
       //dd($request->category);
       //dd($request->all());
       return redirect()->back();
    }
    
    public function update(Request $request, $categoryId)
    {
       // dd( \App\Models\Models\Category::all());
        
       $category = Category::find($categoryId); 
       
       $category->name  = $request->name;
       $category->save();
       //dd($request->category);
       //dd($request->all());
       return redirect()->back();
    }
}
