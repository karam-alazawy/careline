<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'date_in',
        'date_out',
        'room_id',
        'table_id',
        'customer_id',
        'addedByUserId',
        'updated_at',
        'created_at',
        
       ];
       public function customerRes()
       {
           return $this->hasOne('App\Models\Customer','id','customer_id');
       }
       public function roomRes()
       {
           return $this->hasOne('App\Models\RoomName','room_id','room_id');
       }
       public function roomRes2()
       {
           return $this->hasOne('App\Models\Room','id','room_id');
       }
       public function tableRes()
       {
           return $this->hasOne('App\Models\Table','id','table_id');
       }
}
