<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SupplierDeliveryDetails extends Model
{
    //    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table         = 'supplier_delivery_details';
    protected $primaryKey    = 'id_supplier_delivery_details';
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
        'id_supplier_delivery' ,
        'id_country' ,
        'id_province' ,
        'id_sub_state' ,

        'per_weight' ,
        'shipping_cost_weight' ,
        'per_measurement' ,
        'shipping_cost_measurement' ,

        'delivery_days'
    ];


    /**
     * Validation that check request.
     *
     * @var array
     */

    /**
     * Relation with other models to relation data through it.
     */

    public function subState()
    {
        return $this->hasOne('App\Models\System\Location\SubState','id_sub_state','id_sub_state');
    }
    public function province()
    {
        return $this->hasOne('App\Models\System\Location\Province','id_province','id_province');
    }

    public function supplierDelivery()
    {
        return $this->belongsTo(SupplierDelivery::class,'id_supplier_delivery','id_supplier_delivery');
    }
}
