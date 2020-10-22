
<?php

use Illuminate\Support\Facades\Route;
use App\Models\Office;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/customerLogin',function ()
{
	if (session('customer')!=null) {
		$customer=session('customer');
		$lang=1;
		$offices = Office::with(['officeLang' => function ($q) use ($lang) {
			$q->where('lang_id',$lang);
			// $q->addSelect('?')
		}])->when(1,function ($q) use ($customer){
			$q->where('office_province',$customer->province);
		})
		->get();
		$country="s";

		return view('customerUi.home',compact('offices',"country",'customer'));
	}else
	return view('customerUi.login');;

});
Route::get('/customerLogout',function ()
{
	Session::forget('customer');

	return view('customerUi.login');;

});

Route::post('customerLogin/', ['as' => 'customer.login', 'uses' => 'CustomerUiController@login']);
Route::get('customer/', ['as' => 'customer.booking', 'uses' => 'CustomerUiController@addNewBooking']);

Route::group(['middleware' => 'auth'], function () {
	//users
	Route::get('/newUser',  'UserController@newUser');
	Route::get('/editUser/{id}', ['as' => 'user.edit', 'uses' => 'UserController@editUser']);
	Route::get('/users',  ['as' => 'user.index', 'uses' => 'UserController@users']);
	Route::get('/inactive',  ['as' => 'user.inactive', 'uses' => 'UserController@inactive']);
	Route::get('/activeUser/{id}', ['as' => 'user.activeUser', 'uses' => 'UserController@activeUser']);
	Route::post('newUser/', ['as' => 'user.add', 'uses' => 'UserController@addNewUser']);


	//customers
	Route::post('renewalSubscription/', ['as' => 'customer.renewalSubscription', 'uses' => 'CustomerController@renewalSubscription']);
	Route::get('/newCustomer',  'CustomerController@newCustomer');
	Route::post('newCustomer/', ['as' => 'customer.add', 'uses' => 'CustomerController@addNewCustomer']);
	Route::get('/customers',  ['as' => 'customer.index', 'uses' => 'CustomerController@customers']);
	Route::get('customerSubscription/', ['as' => 'customer.customerSubscription', 'uses' => 'CustomerController@customerSubscription']);
	Route::get('subscriptions/', ['as' => 'user.subscriptions', 'uses' => 'CustomerController@subscriptions']);
	Route::get('addSubscription/', ['as' => 'user.addSubscription', 'uses' => 'CustomerController@addSubscription']);
	Route::post('addNewSubscription/', ['as' => 'user.addNewSubscription', 'uses' => 'CustomerController@addNewSubscription']);
	
	//office
	Route::get('/newOffice',  'OfficeController@newOffice');
	Route::get('/offices',  ['as' => 'office.index', 'uses' => 'OfficeController@offices']);
	Route::post('newOffice/', ['as' => 'office.add', 'uses' => 'OfficeController@addNewOffice']);
	Route::get('/edit/{id}', ['as' => 'office.edit', 'uses' => 'OfficeController@editOffice']);


	//rooms
	Route::get('/newRoom',  'RoomController@newRoom');
	Route::get('/rooms',  ['as' => 'room.index', 'uses' => 'RoomController@rooms']);
	Route::post('newRoom/', ['as' => 'room.add', 'uses' => 'RoomController@addNewRoom']);
	Route::get('getOffice/', ['as' => 'room.getOffice', 'uses' => 'RoomController@getOffice']);


	//tables
	Route::get('/newTable',  'TablesController@newTable');
	Route::get('/tables',  ['as' => 'table.index', 'uses' => 'TablesController@tables']);
	Route::post('newTable/', ['as' => 'table.add', 'uses' => 'TablesController@addnewTable']);


	//BookingController
	Route::get('/newBooking',  'BookingController@newBooking');
	Route::get('/booking',  ['as' => 'booking.index', 'uses' => 'BookingController@booking']);
	Route::post('newBooking/', ['as' => 'booking.add', 'uses' => 'BookingController@addNewBooking']);
	Route::get('getCustomer/', ['as' => 'booking.getCustomer', 'uses' => 'BookingController@getCustomer']);
	Route::get('newBooking/', ['as' => 'booking.add', 'uses' => 'BookingController@newBooking']);

	
//	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
	Route::get('{page}', ['as' => 'page.index', 'uses' => 'PageController@index']);
});
 
