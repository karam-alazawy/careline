<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\officeName;
use App\Models\Country;

class Office extends Model
{
    protected $fillable = [
        'office_country',
        'office_province',
        'addedByUserId',
        'updated_at',
        'created_at',

       ];

    public function officeLang()
    {
        return $this->hasOne(OfficeName::class,'office_id','id');
    }

    public function officeCountry()
    {
        return $this->hasOne(Country::class,'id','office_country');
    }
}
