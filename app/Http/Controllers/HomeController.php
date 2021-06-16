<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Transaction;
use App\ItemData;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $items = ItemData::selectRaw('SUM(price) as totalPrice,SUM(amount) as totalAmount,SUM(quantity) as totalQuantity,item_id')->groupBy('item_id')->orderBy('totalQuantity','desc')->where('created_at','>','2021-06-15 00:39:56')->with(['transaction' => function ($q) {
           
        }])->limit(15)->get();
        //  return $itemData;
   

          return view('home', compact('items'));
    }
}
