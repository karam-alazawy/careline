<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Helpers\Permissions;
use App\Models\office;

class OfficeController extends Controller
{
    public function offices()
    {
        $offices = DB::table('offices')->where('active',1)->get();

        Permissions::havePermission("editOffice");
        return view('offices.index', compact('offices'));
    }
    public function editOffice($id){
        
        $office = DB::table('offices')->where('id',$id)->get()->first();
        //return $user->{'name'};
        Permissions::havePermission("editUsers");
        return view('offices.edit', compact('office'));
    }
    
    
    public function newOffice(){
        
        Permissions::havePermission("addOffice");
        return view('offices.add');
    }

    public function addNewOffice(Request $request)
    {
        Permissions::havePermission("addOffice");
        $users = Office::create([
            'office_name' => $request['name'],
            'office_province' => $request['province'],
            'addedByUserId' => auth()->user()->id
            ]);
        return back()->withStatus(__('Office successfully added.'));

    }
 
}
