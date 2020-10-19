<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class SupplierDelivery extends Model
{
    //    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table         = 'supplier_delivery';
    protected $primaryKey    = 'id_supplier_delivery';
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
        'id_supplier' , 'active'
    ];

    /**
     * Validation that check request.
     *
     * @var array
     */

    /**
     * Relation with other models to relation data through it.
     */

     public function deliveryDetails()
     {
        return $this->hasMany(SupplierDeliveryDetails::class,'id_supplier_delivery','id_supplier_delivery');
     }

     public function supplier()
     {
        return $this->hasOne(User::class,'id','id_supplier');
     }
}
