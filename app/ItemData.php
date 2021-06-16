<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemData extends Model
{
    protected $table         = 'item_data';
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
        'item_id' , 'quantity' , 'price' , 'amount'
    ];

    /**
     * Validation that check request.
     *
     * @var array
     */
    public function transaction()
    {
        return $this->hasOne(Transaction::class,'id','item_id');
    }
    /**
     * Relation with other models to relation data through it.
     */
}
