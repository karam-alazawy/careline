<?php

namespace App\Http\Controllers;
use App\Transaction;

use Illuminate\Http\Request;

class ItemsController extends Controller
{
        
    public function items(){

        $items = Transaction::where('active',1)->get();
      //  return $items;
        return view('items.index', compact('items'));
    }

    public function unactive($id)
    {
        $Transaction = Transaction::where('id', $id)
        ->update(['active' => 0]);
        return back()->withStatus(__('Items Successfully Unactive.'));
    }

}
