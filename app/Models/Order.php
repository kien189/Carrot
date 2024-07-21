<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $appends = ['totalPrice'];

    use HasFactory;
    protected $table = 'order';
    protected $fillable = [
        'customer_id',
        'product_id',
        'order_id',
        'totalPrice',
        'quantity',
        'variant_id',
        'coupon_id'
    ];

    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function variants()
    {
        return $this->hasOne(ProductVariants::class, 'id', 'variant_id');
    }

    public function  getTotalPriceAttribute($orderId)
    {
        $total = Order::where('order_id', $orderId)->sum('price');

        return $total;
    }
}
