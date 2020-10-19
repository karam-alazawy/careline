<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubState extends Model
{
    //    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table         = 'sub_state';
    protected $primaryKey    = 'id_sub_state';
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
        'id_province' , 'active'
    ];

    /**
     * Validation that check request.
     *
     * @var array
     */

    /**
     * Relation with other models to relation data through it.
     */
    public function subStateLang()
    {
        return $this->hasOne('App\Models\System\Location\SubStateLang','id_sub_state','id_sub_state');
    }
    public function province()
    {
        return $this->belongsTo('App\Models\System\Location\Province','id_province','id_province');
    }
}
