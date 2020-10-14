<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Helpers\Permissions;

class RoomController extends Controller
{
    public function newRoom(){
        
        Permissions::havePermission("addUser");
        return view('rooms.add');
    }
  
}
