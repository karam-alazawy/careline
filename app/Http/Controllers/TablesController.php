<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Helpers\Permissions;
use App\Models\office;

class TablesController extends Controller
{
    public function newTable(){
        Permissions::checkActive();


        $lang=1;
        // $offices = office::join('office_bnames', 'offices.id', '=', 'office_names.office_id')->select("office_name","offices.id")->where('active',1)->get();
        $offices = office::with(['officeLang' => function ($q) use ($lang) {
            $q->where('lang_id',$lang);
            // $q->addSelect('?')
        }])->get();
        Permissions::havePermission("addTable");
        return view('tables.add',compact('offices'));

    }
  
    public function addnewTable(Request $request)
    {
        Permissions::checkActive();
        Permissions::havePermission("addTable");
        $room = Room::create([
            'office_id' => $request['office'],
            'room_type' => $request['roomType'],
            'addedByUserId' => auth()->user()->id
            ]);
            if ($room) {
                $id=$room->id;
                for ($i=1; $i <4 ; $i++) { 
                    $room_names = RoomName::create([
                        'room_name' => $request['name'],
                        'room_id' => $id,
                        'lang_id' => $i,
                        ]);
                }
              
            }
           
        return back()->withStatus(__('Room successfully added.'));
    }

}
