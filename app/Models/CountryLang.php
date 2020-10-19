<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CountryLang extends Model
{
    //    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table         = 'country_lang';
    protected $primaryKey    = 'id_country';
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

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
        'id_country' , 'id_lang' , 'name' , 'active'
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
}
