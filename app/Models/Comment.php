<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'comment';

    protected $fillable = ['customer_id', 'product_id', 'content', 'reply_id', 'rating'];

    public function customers() {
        return $this->hasOne(Customers::class, 'id', 'customer_id');
    }


    public function products()
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }
}
