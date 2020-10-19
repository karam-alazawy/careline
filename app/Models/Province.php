<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    //    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table         = 'provinces';
    protected $primaryKey    = 'id_province';
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The storage format of the model's date columns.
     *
     * @var string
     */
    //protected $dateFormat = 'U';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [];

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_province' , 'id_country' , 'id_zone' , 'iso_code' , 'tax_behavior' , 'active'
    ];

    /**
     * Validation that check request.
     *
     * @var array
     */

    /**
     * Relation with other models to relation data through it.
     */

    public function provinceLang()
    {
        return $this->hasOne('App\Models\ProvinceLang','id_province','id_province');
    }

    public function country()
    {
        return $this->belongsTo('App\Models\Country','id_country','id_country');
    }

    public function subState()
    {
        return $this->hasMany(SubState::class,'id_province','id_province');
    }
}
