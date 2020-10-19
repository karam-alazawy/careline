<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProvinceLang extends Model
{
      //    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table         = 'province_lang';
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
        'id_province' , 'id_lang' , 'name' , 'active'
    ];

    /**
     * Validation that check request.
     *
     * @var array
     */

    /**
     * Relation with other models to relation data through it.
     */
    public function lang()
    {
        return $this->hasOne('App\Models\System\Language','id_lang','id_lang');
    }
    public function province()
    {
        return $this->belongsTo(Province::class,'id_province','id_province');
    }
}
