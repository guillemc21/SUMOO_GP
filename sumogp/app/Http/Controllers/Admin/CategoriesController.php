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
       
       return view('admin.categories.index');
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
}
