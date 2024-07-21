<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oder_detail extends Model
{
    use HasFactory;
    protected $table = 'order_detail';
    protected $fillable = ['name', 'email', 'phone', 'address', 'customer_id', 'status', 'note', 'token'];

    public function customers()
    {
        return $this->belongsTo(Customers::class, 'customer_id', 'id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'order_id', 'id');
    }
}
