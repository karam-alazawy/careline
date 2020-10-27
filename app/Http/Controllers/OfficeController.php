<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Helpers\Permissions;
use App\Models\Office;
use App\Models\OfficeName;
use App\Models\Country;

class OfficeController extends Controller
{
    
    public function offices()
    {

        Permissions::checkActive();

       // $offices = Office::where('active',1)->get();
        $lang=1;
        // $offices = Office::join('office_bnames', 'offices.id', '=', 'office_names.office_id')->select("office_name","offices.id")->where('active',1)->get();
        $offices = Office::with(['officeLang' => function ($q) use ($lang) {
            $q->where('lang_id',$lang);
            
            // $q->addSelect('?')
        }])->with(['countryLang' => function ($q) use ($lang) {
            // $q->addSelect('?')
        }])->with(['provinceLang' => function ($q) use ($lang) {
            // $q->addSelect('?')
        }])->where('active',1)->get();
        //return $offices;
        //return $offices;
        return view('offices.index', compact('offices'));
    }
    public function editOffice($id){
      //  Permissions::havePermission("editUsers");
      Permissions::havePermission("editOffice");

        Permissions::checkActive();
        $lang=1;
        $office = Office::with(['officeLang' => function ($q) use ($lang) {
            $q->where('lang_id',$lang);
            // $q->addSelect('?')
        }])
        ->where('id',$id)->first();
        $country = Country::with(['countryLang' => function ($q) use ($lang) {
            $q->where('id_lang',$lang);
            // $q->addSelect('?')
        }])
        ->get();
        //return $user->{'name'};
        return view('offices.edit', compact('office','country'));
    }

    public function editTheOffice(Request $request,$id)
    {
        $Office_name = OfficeName::where('office_id', $id)
        ->update(['office_name' => $request->name]);
        return back()->withStatus(__('Office Successfully Update.'));
       return $request;
    }

    public function newOffice(){
        Permissions::checkActive();
        Permissions::havePermission("addOffice");
        $lang=1;

        $country = Country::with(['countryLang' => function ($q) use ($lang) {
            $q->where('id_lang',$lang);
            // $q->addSelect('?')
        }])
        ->get();
        return view('offices.add',compact('country'));
    }

    public function addNewOffice(Request $request)
    {
        if(empty($request['country']) or empty($request['province']) or empty($request['name']))
        return back()->withStatus(__('Insert All Information.'));

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

    public function unactive($id)
    {
        Permissions::havePermission("editOffice");

        $Office = Office::where('id', $id)
        ->update(['active' => 0]);
        return back()->withStatus(__('Office Successfully Unactive.'));
    }
 
}
