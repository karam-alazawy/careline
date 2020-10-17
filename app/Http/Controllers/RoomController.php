<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Helpers\Permissions;
use App\Models\office;
use App\Models\Room;
use App\Models\RoomName;

class RoomController extends Controller
{
    public function newRoom(){
        Permissions::checkActive();


        $lang=1;
        // $offices = office::join('office_bnames', 'offices.id', '=', 'office_names.office_id')->select("office_name","offices.id")->where('active',1)->get();
        $offices = office::with(['officeLang' => function ($q) use ($lang) {
            $q->where('lang_id',$lang);
            // $q->addSelect('?')
        }])->get();
        Permissions::havePermission("addRoom");
        return view('rooms.add',compact('offices'));

    }
  
    public function addNewRoom(Request $request)
    {
        Permissions::checkActive();
        Permissions::havePermission("addRoom");
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
    public function rooms(Request $request){
        $id=$request['office'];
        Permissions::checkActive();
        Permissions::havePermission("editRooms");

       //$rooms = Room::where('active',1)->where( 'office_id',$id)->get();


        $lang=1;
        $rooms = Room::with(['roomLang' => function ($q) use ($lang) {
            $q->where('lang_id',$lang);
            
            // $q->addSelect('?')
        }])->where('active',1)->where( 'office_id',$id)->get();
       // return $rooms;
        return view('rooms.index', compact('rooms'));
    }
    public function getOffice()
        {
        $lang=1;
        // $offices = office::join('office_bnames', 'offices.id', '=', 'office_names.office_id')->select("office_name","offices.id")->where('active',1)->get();
        $offices = office::with(['officeLang' => function ($q) use ($lang) {
            $q->where('lang_id',$lang);
            // $q->addSelect('?')
        }])->get();
        Permissions::havePermission("addRoom");
        return view('rooms.edit',compact('offices'));

        }
}
