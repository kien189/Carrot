<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $appends = 'TotalPrice';
    protected $table = 'cart';
    protected $fillable = ['customer_id', 'product_id', 'variant_id', 'quantity'];

    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function variants()
    {
        return $this->hasOne(ProductVariants::class, 'id', 'variant_id');
    }

    public function getTotalPriceAttribute()
    {
        $totalPrice = 0;
        $carts = Cart::where('customer_id', auth('customers')->id())->get();
        foreach ($carts as  $value) {
            $totalPrice += $value->variants->sale_price * $value->quantity;
        }
        return $totalPrice;
    }
}
