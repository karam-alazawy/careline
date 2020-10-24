<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Helpers\Permissions;
use App\Models\Office;
use App\Models\Room;
use App\Models\RoomName;

class RoomController extends Controller
{
    public function newRoom($id){
       // return $id;
        Permissions::checkActive();
        $checkNeed= Permissions::haveAllPermission();

        $province=auth()->user()->province;
        $lang=1;
        // $offices = Office::join('office_bnames', 'offices.id', '=', 'office_names.office_id')->select("office_name","offices.id")->where('active',1)->get();
        $offices = Office::with(['officeLang' => function ($q) use ($lang) {
            $q->where('lang_id',$lang);
            // $q->addSelect('?')
        }])->where('id',$id)->
        // ->when(!$checkNeed,function ($q) use ($province){
        //     $q->where('office_province',$province);
        // })->
        first();
        Permissions::havePermission("addRoom");
        return view('rooms.add',compact('offices'));

    }
  
    public function addNewRoom(Request $request)
    {
        Permissions::checkActive();
        Permissions::havePermission("addRoom");
        if (empty($request['name'])) {
            return back()->withStatus(__('Insert Room Name.'));

        }
        $room = Room::create([
            'office_id' => $request['office_id'],
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
    public function rooms(Request $request,$id=null){
        if (empty($id)) {
            $id=$request['office'];
        }
       
        Permissions::checkActive();
        Permissions::havePermission("editRooms");

       //$rooms = Room::where('active',1)->where( 'office_id',$id)->get();


        $lang=1;
        $rooms = Room::with(['roomLang' => function ($q) use ($lang) {
            $q->where('lang_id',$lang);
            
            // $q->addSelect('?')
        }])->where('active',1)->where( 'office_id',$id)->get();
       // return $rooms;
        return view('rooms.index', compact('rooms','id'));
    }
    
    public function getOffice()
        {
        $lang=1;
        $checkNeed= Permissions::haveAllPermission();
        $province=auth()->user()->province;
        //return $province;
        // $offices = Office::join('office_bnames', 'offices.id', '=', 'office_names.office_id')->select("office_name","offices.id")->where('active',1)->get();
        $offices = Office::with(['officeLang' => function ($q) use ($lang) {
            $q->where('lang_id',$lang);
            // $q->addSelect('?')
        }])->when(!$checkNeed,function ($q) use ($province){
            $q->where('office_province',$province);
        })->where('active',1)->get();
        Permissions::havePermission("addRoom");

        return view('rooms.edit',compact('offices'));

        }
        
        public function unactive($id)
        {
            $Room = Room::where('id', $id)
            ->update(['active' => 0]);
            $office=4;
            return redirect()->route('room.index',[$office]);


            return back()->withStatus(__('Room Successfully Unactive.'));
        }
     
}
