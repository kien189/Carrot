<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer_reset_token extends Model
{
    use HasFactory;
    protected $table = 'customer_reset_tokens';
    protected $fillable = ['email', 'token','expires_at','is_used'];

    // public function customer()
    // {
    //     return $this->hasOne(Customers::class, 'email', 'email');
    // }

    public function scopeCheckToken($query, $token){
        return $query->where('token', $token)
        ->where('expires_at', '>', Carbon::now())
        ->where('is_used',false) // Chỉ lấy token chưa hết hạn
        ->firstOrFail();
    }
}
