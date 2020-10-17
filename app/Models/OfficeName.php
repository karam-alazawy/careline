<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OfficeName extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'office_name',
        'office_id',
        'lang_id',
       ];
}
