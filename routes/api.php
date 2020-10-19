<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Province;

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
    }])->where('id_country',$request['id'])->get();
    return $province;
});