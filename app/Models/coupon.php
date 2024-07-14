<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class coupon extends Model
{
    use HasFactory;
    protected $table = 'coupon';
    protected $fillable = ['coupon_name', 'coupon_code', 'coupon_condition', 'coupon_number', 'coupon_quantity'];
}
