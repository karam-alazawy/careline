<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\RoomName;

class Room extends Model
{
    protected $fillable = [
        'office_id',
        'room_type',
        'addedByUserId',
        'updated_at',
        'created_at',

       ];
       public function roomLang()
       {
           return $this->hasOne(RoomName::class,'room_id','id');
       }

    // public function officeCountry()
    // {
    //     return $this->hasOne(Country::class,'id','office_country');
    // }
}
