<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShipmentOrder extends Model
{
    use HasFactory;
    protected $table ='shipment_detail';
    protected $fillable =['order_id','payment_id','delivery_id'];

    public function order_details(){
        return $this->hasOne(Oder_detail::class,'id','order_id');
    }
}
