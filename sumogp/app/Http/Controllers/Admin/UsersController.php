<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Exception;

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
       try{
            // dd( \App\Models\Models\Category::all());
            //$newUser = new User();
            //$newUser->name  = $request->name;
            //$newUser->last_name  = $request->last_name;
            //$newUser->email  = $request->email;
            //$newUser->password  = Hash::make($request->password);
            //    $newUser->role  = $request->role;
        
            //    $newUser->save();

            User::create([
                'name' => $request->name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
            ]);
            //dd($request->category);
            //dd($request->all());
            return redirect()->back();
        }catch(Exception $e){
            return redirect()->back()->with('error', 'OK');
        }
    }

    public function update(Request $request, $userId)
    {
    // dd( \App\Models\Models\Category::all());
    
    $user = User::find($userId); 
    
    

    $user->name  = $request->name;
    $user->last_name  = $request->last_name;
    $user->email  = $request->email;
    $user->password  = Hash::make($request->password);
    $user->role  = $request->role;
    
    
    $user->save();
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
