<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer_reset_token extends Model
{
    use HasFactory;
    protected $primaryKey = 'email';
    protected $table = 'customer_reset_tokens';
    protected $fillable = ['email', 'token'];

    public function customers()
    {
        return $this->hasOne(Customers::class, 'email', 'email');
    }
}
