<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Permissions;
use App\Models\Country;
use App\Models\Customer;
use App\Models\Office;

class BookingController extends Controller
{
    public function newBooking(Request $request){
        Permissions::checkActive();
        Permissions::havePermission("addBooking");
        $lang=1;
        $customer_id=$request['customer_id'];
        $offices = Office::with(['officeLang' => function ($q) use ($lang) {
            $q->where('lang_id',$lang);
            // $q->addSelect('?')
        }])
        ->get();
        return view('booking.add',compact('offices','customer_id'));
    }  
    
    public function getCustomer(){
        Permissions::checkActive();
        Permissions::havePermission("addBooking");
        $lang=1;

        $customer = Customer::get();
        return view('Booking.getCustomer',compact('customer'));
    }

    public function addNewBooking(Request $request)
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
