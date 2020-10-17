<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomName extends Model
{

    public $timestamps = false;
    protected $fillable = [
        'room_name',
        'room_id',
        'lang_id',
       ];


}
