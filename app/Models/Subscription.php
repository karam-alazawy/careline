<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $fillable = [
        'price',
        'period',
        'type',
        'addedByUserId',
        'updated_at',
        'created_at',

       ];
       public function subscriptionLang()
       {
           return $this->hasOne(SubscriptionName::class,'subscription_id','id');
       }
}
