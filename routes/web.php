
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

Route::get('/', 'HomeController@index')->name('home');

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
		->where('active',1)->get();
		$country="s";

		return view('customerui.home',compact('offices',"country",'customer'));
	}else
	return view('customerui.login');;

});

Route::get('/loginAdmin',function ()
{
	return view('auth.login');;

});
Route::get('/customerLogout',function ()
{
	Session::forget('customer');

	return view('customerui.login');;

});

Route::post('customerLogin/', ['as' => 'login', 'uses' => 'CustomerUiController@login']);
Route::get('customer/', ['as' => 'customer.booking', 'uses' => 'CustomerUiController@addNewBooking']);
Route::get('customerReservations/', ['as' => 'customer.reservations', 'uses' => 'CustomerUiController@reservations']);
Route::get('customerSaveProvince/', ['as' => 'customer.saveProvince', 'uses' => 'CustomerUiController@saveProvince']);

Route::group(['middleware' => 'auth'], function () {
	//users
	Route::get('/newUser',  'UserController@newUser');
	Route::get('/editUser/{id}', ['as' => 'user.edit', 'uses' => 'UserController@editUser']);
	Route::get('/users',  ['as' => 'user.index', 'uses' => 'UserController@users']);
	Route::get('/inactive',  ['as' => 'user.inactive', 'uses' => 'UserController@inactive']);
	Route::get('/userUnactive/{id}',  ['as' => 'user.unactive', 'uses' => 'UserController@unactive']);
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
	Route::get('/customerUnactive/{id}',  ['as' => 'customer.unactive', 'uses' => 'CustomerController@unactive']);
	Route::get('/subscriptionUnactive/{id}',  ['as' => 'subscription.unactive', 'uses' => 'CustomerController@subscriptionUnactive']);

	//office
	Route::get('/newOffice',  'OfficeController@newOffice');
	Route::get('/offices',  ['as' => 'office.index', 'uses' => 'OfficeController@offices']);
	Route::post('newOffice/', ['as' => 'office.add', 'uses' => 'OfficeController@addNewOffice']);
	Route::get('/edit/{id}', ['as' => 'office.edit', 'uses' => 'OfficeController@editOffice']);
	Route::get('/unactive/{id}',  ['as' => 'office.unactive', 'uses' => 'OfficeController@unactive']);
	Route::put('editOffice/{id}', ['as' => 'office.editTheOffice', 'uses' => 'OfficeController@editTheOffice']);
	Route::get('unactivateOffices', ['as' => 'office.unactivate', 'uses' => 'OfficeController@unactivate']);


	//rooms
	Route::get('/newRoom/{id}',   ['as' => 'room.addRoom', 'uses' => 'RoomController@newRoom']);
	Route::get('/rooms/{id?}',  ['as' => 'room.index', 'uses' => 'RoomController@rooms']);
	Route::post('newRoom', ['as' => 'room.add', 'uses' => 'RoomController@addNewRoom']);
	Route::get('getOffice/', ['as' => 'room.getOffice', 'uses' => 'RoomController@getOffice']);
	Route::get('/roomUnactive/{id}',  ['as' => 'room.unactive', 'uses' => 'RoomController@unactive']);
	Route::get('editRoom/{id}', ['as' => 'room.edit', 'uses' => 'RoomController@editRoom']);


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
	Route::get('/bookingApprove/{id}',  ['as' => 'booking.approve', 'uses' => 'BookingController@approve']);
	Route::get('/bookingCancel/{id}',  ['as' => 'booking.cancel', 'uses' => 'BookingController@cancel']);

	
//	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
	Route::get('{page}', ['as' => 'page.index', 'uses' => 'PageController@index']);
});
 
