<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Helpers\Permissions;
use App\Models\office;
use App\Models\officeName;

class OfficeController extends Controller
{
    
    public function offices()
    {

        Permissions::checkActive();
        Permissions::havePermission("editOffice");

       // $offices = Office::where('active',1)->get();
        $lang=1;
        // $offices = office::join('office_bnames', 'offices.id', '=', 'office_names.office_id')->select("office_name","offices.id")->where('active',1)->get();
        $offices = office::with(['officeLang' => function ($q) use ($lang) {
            $q->where('lang_id',$lang);
            
            // $q->addSelect('?')
        }])->with(['officeCountry' => function ($q) use ($lang) {
            
            
            // $q->addSelect('?')
        }])->where('active',1)->get();
        //return $offices;
        return view('offices.index', compact('offices'));
    }
    public function editOffice($id){
        Permissions::checkActive();

        $office = Office::where('id',$id)->get()->first();
        //return $user->{'name'};
        Permissions::havePermission("editUsers");
        return view('offices.edit', compact('office'));
    }
    

    public function newOffice(){
        Permissions::checkActive();
        Permissions::havePermission("addOffice");
        return view('offices.add');
    }

    public function addNewOffice(Request $request)
    {
        Permissions::checkActive();
        Permissions::havePermission("addOffice");
        $office = Office::create([
            'office_country' => $request['country'],
            'office_province' => $request['province'],
            'addedByUserId' => auth()->user()->id
            ]);
            if ($office) {
                $id=$office->id;
                for ($i=1; $i <4 ; $i++) { 
                    $office_names = OfficeName::create([
                        'office_name' => $request['name'],
                        'office_id' => $id,
                        'lang_id' => $i,
                        ]);
                }
              
            }
           
        return back()->withStatus(__('Office successfully added.'));

    }
 
}
