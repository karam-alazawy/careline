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
}
