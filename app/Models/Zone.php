<?php

namespace App\Models\System\Location;

use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    //    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table         = 'zone';
    protected $primaryKey    = 'id_zone';
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
        'name','active'
    ];

    /**
     * Validation that check request.
     *
     * @var array
     */

    /**
     * Relation with other models to relation data through it.
     */
}
