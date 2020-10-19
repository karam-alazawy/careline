<?php

namespace App\Http\Controllers;

use App\User;
use App\Helpers\Permissions;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\users;
use App\Models\office;
use App\Models\Subscription;
use App\Models\SubscriptionName;

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
        $users = users::where('active',1)->where( 'id','!=',1)->get();
        Permissions::havePermission("editUsers");
        return view('users.index', ['users' => $users]);
    }

    public function inactive(){
        Permissions::checkActive();
        $users = users::where('active',0)->get();
        Permissions::havePermission("editUsers");
        return view('users.inactive', ['users' => $users]);
    }
    
    public function edituser($id){
        Permissions::checkActive();
        $user = users::where('id',$id)->get()->first();
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
          // $offices = office::join('office_bnames', 'offices.id', '=', 'office_names.office_id')->select("office_name","offices.id")->where('active',1)->get();
          $offices = office::with(['officeLang' => function ($q) use ($lang) {
              $q->where('lang_id',$lang);
              // $q->addSelect('?')
          }])
          ->get();
       // return $offices->officeLang->office_id;
          // return view('users.add',['offices' => $offices]);
           return view('users.add',compact('offices'));
  
      }

      
      public function addSubscription(){
        //  return  Carbon::now()->addMonths(1);
          Permissions::checkActive();
          Permissions::havePermission("addSubscription");
       
           return view('users.addSubscription');
  
      }
      public function addNewSubscription(Request $request)
      {
          Permissions::checkActive();
          Permissions::havePermission("addSubscription");
          $subscription = Subscription::create([
              'price' => $request['price'],
              'type' => $request['type'],
              'period' => $request['period'],
              'addedByUserId' => auth()->user()->id
              ]);
              if ($subscription) {
                  $id=$subscription->id;
                  for ($i=1; $i <4 ; $i++) { 
                      $subscription_name = SubscriptionName::create([
                          'subscription_name' => $request['name'],
                          'subscription_id' => $id,
                          'lang_id' => $i,
                          ]);
                  }
                
              }
             
          return back()->withStatus(__('Subscription successfully added.'));
  
      }
  
    public function userSubscription(Request $request){
        $id=$request['id'];
        Permissions::checkActive();
        Permissions::havePermission("userSubscription");
        $lang=1;
        $subscriptions = Subscription::with(['subscriptionLang' => function ($q) use ($lang) {
            $q->where('lang_id',$lang);
            // $q->addSelect('?')
        }])->get();

        return view('users.subscription',compact('subscriptions','id'));
    }

    public function addNewUser(Request $request)
    {
        Permissions::checkActive();
        Permissions::havePermission("addUser");
        $permissions=0;
        if($request['permissions'])
        $permissions=implode( ",", $request['permissions'] ); 
        try { 
            $users = users::create([
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

    public function renewalSubscription(Request $request)
    {
        Permissions::checkActive();
        Permissions::havePermission("renewalSubscription");

        $subscription = Subscription::where('active',1)->where( 'id',$request['type'])->first();

        $flager=1;
        $date=0;
        $subscription_date = users::select("subscription_date")->find($request['id']);
        $subscription_date = $subscription_date->subscription_date;
        if ($subscription_date<Carbon::now()) {
            $subscription_date=Carbon::now();
        }
          switch ($subscription->type) {
            case 'daily':
                $date=Carbon::parse($subscription_date)->addDays($subscription->period);
                break;
            case 'weekly':
                $date=Carbon::parse($subscription_date)->addWeeks($subscription->period);
                    break;
            case 'monthly':
                $date=Carbon::parse($subscription_date)->addMonths($subscription->period);
                break;
            case 'yearly':
                    $date=Carbon::parse($subscription_date)->addYears($subscription->period);
                    break;
                  
              default:
                  $flager=0;
                  break;
          }
          if ($flager) {

            
            $renewalSubscription = users::where('id',  $request['id'])
            ->update(['subscription_date' => $date]);
            return back()->withStatus(__("Successfully"));

          }
          return back()->withStatus(__("error"));

           

    }

    
    public function subscriptions()
    {
         Permissions::checkActive();
         Permissions::havePermission("editSubscriptions");
         $lang=1;
         $subscriptions = Subscription::with(['subscriptionLang' => function ($q) use ($lang) {
            $q->where('lang_id',$lang);
            // $q->addSelect('?')
         }])->get();
          return view('users.subscriptions',compact('subscriptions'));
 
    }
    public function activeUser($id)
    {
        Permissions::checkActive();
        $users = users::where('id', $id)
        ->update(['active' => 1]);
            return back()->withStatus(__('User Successfully Added.'));

    }
 
}
