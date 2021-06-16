<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

use App\Transaction;
use App\ItemData;
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

Route::get('/getBestLast7', function (Request $request) {

    $itemData = ItemData::selectRaw('SUM(price) as totalPrice,SUM(amount) as totalAmount,SUM(quantity) as totalQuantity,item_id')->groupBy('item_id')->orderBy('totalQuantity','desc')->where('created_at','>','2021-06-15 00:39:56')->limit(15)->get();
    //  return $itemData;
    $a=array();
    $b=array();
        
foreach ($itemData as $key => $value) {
    array_push($b,$value->totalQuantity);
    $transaction = Transaction::where('id', $value->item_id)->first();
    array_push($a,$transaction->name);
}


$c=array($a,$b);

    return json_encode($c, JSON_PRETTY_PRINT);
    

});



Route::get('/getLowestLast7', function (Request $request) {

    $itemData = ItemData::selectRaw('SUM(price) as totalPrice,SUM(amount) as totalAmount,SUM(quantity) as totalQuantity,item_id')->groupBy('item_id')->orderBy('totalQuantity','asc')->where('created_at','>','2021-06-15 00:39:56')->limit(15)->get();
    //  return $itemData;
    $a=array();
    $b=array();
        
foreach ($itemData as $key => $value) {
    array_push($b,$value->totalQuantity);
    $transaction = Transaction::where('id', $value->item_id)->first();
    array_push($a,$transaction->name);
}


$c=array($a,$b);

    return json_encode($c, JSON_PRETTY_PRINT);
    

});



Route::get('/getBestPriceLast7', function (Request $request) {

    $itemData = ItemData::selectRaw('SUM(price) as totalPrice,SUM(amount) as totalAmount,SUM(quantity) as totalQuantity,item_id')->groupBy('item_id')->orderBy('totalPrice','desc')->where('created_at','>','2021-06-15 00:39:56')->limit(15)->get();
    //  return $itemData;
    $a=array();
    $b=array();
        
foreach ($itemData as $key => $value) {
    array_push($b,$value->totalPrice);
    $transaction = Transaction::where('id', $value->item_id)->first();
    array_push($a,$transaction->name);
}


$c=array($a,$b);

    return json_encode($c, JSON_PRETTY_PRINT);
    

});





Route::get('/getAll', function (Request $request) {
    $itemData = ItemData::selectRaw("SUM(price) as totalPrice,SUM(amount) as totalAmount,SUM(quantity) as totalQuantity,YEAR(created_at) year, MONTH(created_at) month")->groupby('year','month')->orderby('month')->get();

   
    //  return $itemData;
    $a=array();
    $b=array();
        
    
foreach ($itemData as $key => $value) {
    array_push($b,$value->totalQuantity);
    array_push($a,$value->month);
}


$c=array($a,$b);

    return json_encode($c, JSON_PRETTY_PRINT);
    
});



