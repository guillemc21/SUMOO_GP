<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $users = User::all();
        return view('admin.users.index', ['users' => $users]);
    }

    public function store(Request $request)
    {
       // dd( \App\Models\Models\Category::all());
       $newUser = new User();

       $newUser->name  = $request->name;
       $newUser->last_name  = $request->last_name;
       $newUser->email  = $request->email;
       $newUser->password  = Hash::make($request->password);
       $newUser->role  = $request->role;
       
       $newUser->save();
       //dd($request->category);
       //dd($request->all());
       return redirect()->back();
    }

    public function delete(Request $request, $userId)
     {
        // dd( \App\Models\Models\Category::all());
  
        $user = User::find($userId); 
        $user->delete();
        //dd($request->category);
        //dd($request->all());
        return redirect()->route('admin.users')->with('eliminar', 'OK');
     }
}
