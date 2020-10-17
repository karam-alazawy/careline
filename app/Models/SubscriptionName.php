<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubscriptionName extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'subscription_name',
        'subscription_id',
        'lang_id',
       ];
}
