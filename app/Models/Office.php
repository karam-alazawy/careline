<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\OfficeName;
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

    public function countryLang()
    {
        return $this->hasOne('App\Models\CountryLang','id_country','office_country');
    }   
     public function provinceLang()
    {
        return $this->hasOne('App\Models\ProvinceLang','id_province','office_province');
    }

}
