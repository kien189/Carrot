<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariants extends Model
{
    use HasFactory;
    protected $table='productvariants';
    protected $fillable =['price','sale_price','quantity','size','product_id'];

    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }
}
