<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TableName extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'table_name',
        'table_id',
        'lang_id',
       ];

}
