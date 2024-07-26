<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShipmentOrder extends Model
{
    use HasFactory;
    protected $table ='shipment_detail';
    protected $fillable =['code_orders','order_id','payment_id','delivery_id'];

    public function orders(){
        return $this->hasOne(Oder_detail::class,'order_detail','id');
    }
}
