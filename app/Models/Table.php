<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\TableName;

class Table extends Model
{
    protected $fillable = [
        'room_id',
        'addedByUserId',
        'booking_at',
        'updated_at',
        'created_at',

       ];
       public function tableLang()
       {
           return $this->hasOne(TableName::class,'table_id','id');
       }
}
