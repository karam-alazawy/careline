
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


Route::get('/login',function ()
{
	return view('auth.login');;

});
Route::post('login', 'Auth\LoginController@login')->name('login');;



Route::post('login/', ['as' => 'login', 'uses' => 'Auth\LoginController@login']);

Route::group(['middleware' => 'auth'], function () {
	//users



	Route::get('exportExcel/{type}', 'ExcelController@exportExcel')->name('exportExcel');
	Route::post('importExcel', 'ExcelController@importExcel')->name('importExcel');
	
	Route::get('/editUser/{id}', ['as' => 'user.edit', 'uses' => 'UserController@editUser']);
	Route::get('/items',  ['as' => 'user.index', 'uses' => 'ItemsController@items']);


	Route::get('/newUser',  'ExcelController@importExportView');

	Route::post('newUser/', ['as' => 'user.add', 'uses' => 'ExcelController@importExportView']);

	Route::get('{page}', ['as' => 'page.index', 'uses' => 'PageController@index']);

	Route::get('/itemUnactive/{id}',  ['as' => 'item.unactive', 'uses' => 'ItemsController@unactive']);




});
Route::get('/gg',function ()
{

	return "jj";

});
Route::get('customers',  'ItemsController@items')->name('customers');
