<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $fillable = [
        'name',
        'email',
        'password',
        'country',
        'province',
        'updated_at',
        'created_at',
        'permissions',
       ];

       
}
