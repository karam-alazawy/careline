<?php

namespace App\Http\Controllers;

use App\User;
use App\Helpers\Permissions;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Office;
use App\Models\Subscription;
use App\Models\SubscriptionName;
use App\Models\Country;

use Carbon\Carbon;

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
        Permissions::checkActive();
        return view('users.index', ['users' => $model->paginate(15)]);
    }
    public function users(){
        Permissions::checkActive();
        $users = Users::where('active',1)->where( 'id','!=',1)->get();
        Permissions::havePermission("editUsers");
        return view('users.index', ['users' => $users]);
    }

    public function inactive(){
        Permissions::checkActive();
        $users = Users::where('active',0)->get();
        Permissions::havePermission("editUsers");
        return view('users.inactive', ['users' => $users]);
    }
    
    public function edituser($id){
        Permissions::checkActive();
        $user = Users::where('id',$id)->get()->first();
        //return $user->{'name'};
        Permissions::havePermission("editUsers");
        return view('users.edit', ['user' => $user]);
    }
    public function newUser(){
        //  return  Carbon::now()->addMonths(1);
          Permissions::checkActive();
          Permissions::havePermission("addUser");
        //  $is_super_admin = Permissions::havePermission("allper");
        // ->when(!$is_super_admin , function ($q) use (auth()->user()->id){
        //     $q->where();
        // })
          $lang=1;
          // $offices = Office::join('office_bnames', 'offices.id', '=', 'office_names.office_id')->select("office_name","offices.id")->where('active',1)->get();
          $offices = Office::with(['officeLang' => function ($q) use ($lang) {
            $q->where('lang_id',$lang);
            // $q->addSelect('?')
        }])
        ->get();

        $country = Country::with(['countryLang' => function ($q) use ($lang) {
            $q->where('id_lang',$lang);
            // $q->addSelect('?')
        }])
        ->get();
        //return $country;
       // return $offices->officeLang->office_id;
          // return view('users.add',['offices' => $offices]);
           return view('users.add',compact('offices','country'));
  
      }

     
public function unactive($id)
{
    $user = Users::where('id', $id)
    ->update(['active' => 0]);
    return back()->withStatus(__('User Successfully Unactive.'));
}
    public function addNewUser(Request $request)
    {
        Permissions::checkActive();
        Permissions::havePermission("addUser");
        $permissions=0;
        if($request['permissions'])
        $permissions=implode( ",", $request['permissions'] ); 
        try { 
            $users = Users::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'office' => $request['office'],
                'password' => Hash::make($request['password']),
                'permissions' => $permissions,
                'office_id' => $request['office'],
                'addedByUserId' => auth()->user()->id
                ]);
                // if (!$users) {
                //     return back()->withStatus(__("error"));
                // }
                return back()->withStatus(__('User successfully added.'));
          } catch(\Illuminate\Database\QueryException $ex){ 
            return back()->withStatus(__('This email address is not available. choose a different address'));
            // Note any method of class PDOException can be called on $ex.
          }
    

    }



  
    public function activeUser($id)
    {
        Permissions::checkActive();
        $users = Users::where('id', $id)
        ->update(['active' => 1]);
            return back()->withStatus(__('User Successfully Active.'));

    }
 
}
