<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $users = UserModel::all();
        return view('admin.users.index', ['users' => $users]);
    }

    public function store(Request $request) {

    }
}
