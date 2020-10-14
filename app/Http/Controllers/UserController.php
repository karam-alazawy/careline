<?php

namespace App\Http\Controllers;

use App\User;
use App\Helpers\Permissions;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //public $permissions = array("addUser", "BMW", "Toyota");

    /**
     * Display a listing of the users
     *
     * @param  \App\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        return view('users.index', ['users' => $model->paginate(15)]);
    }
    public function users(){
        $users = DB::table('users')->get();
        Permissions::havePermission("editUsers");
        
        return view('users.index', ['users' => $users]);
    }
    public function edituser($id){
        
        $user = DB::table('users')->where('id',$id)->get()->first();
        //return $user->{'name'};
        Permissions::havePermission("editUsers");
        return view('users.edit', ['user' => $user]);
    }
    public function newUser(){
        
        Permissions::havePermission("addUser");
        $offices = DB::table('offices')->select("office_name","id")->where('active',1)->get();

        return view('users.add',['offices' => $offices]);
    }
    public function addNewUser(Request $request)
    {
        return back()->withStatus(__($request['office']));

    }
 
}
