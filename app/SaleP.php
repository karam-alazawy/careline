<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use App\ItemData;

class SaleP extends Model
{
    protected $table         = 'salesP';
    protected $primaryKey    = 'id';

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
        'account','delegate','subject','quantity','price','amount','date','oldId'
    ];

    /**
     * Validation that check request.
     *
     * @var array
     */

    // public function itemData()
    // {
    //     return $this->hasMany(ItemData::class,'item_id','id');
    // }
    /**
     * Relation with other models to relation data through it.
     */
}
