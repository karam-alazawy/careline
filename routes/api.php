<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Province;
use App\Models\Room;
use App\Models\Table;
use App\Models\Reservation;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/getProvince', function (Request $request) {
    $lang=1;
    $province = Province::with(['provinceLang' => function ($q) use ($lang) {
        $q->where('id_lang',$lang);
        // $q->addSelect('?')
    }])->where('id_country',$request['id'])->where('active',1)->get();
    return $province;
});

Route::get('/getRooms', function (Request $request) {
    $lang=1;
    $rooms = Room::with(['roomLang' => function ($q) use ($lang) {
        $q->where('lang_id',$lang);
        // $q->addSelect('?')
    }])->where('office_id',$request['id'])->where('active',1)->get();
    return $rooms;
});

Route::get('/getTables', function (Request $request) {
    $lang=1;
    $tables = Table::with(['tableLang' => function ($q) use ($lang) {
        $q->where('lang_id',$lang);
        // $q->addSelect('?')
    }])->where('room_id',$request['id'])->where('active',1)->get();
    return $tables;
});

Route::get('/getReservations', function (Request $request) {
   
$reservations = Reservation::where("table_id",$request['id'])
 ->where('status','approve')
->get();
    return $reservations;
});