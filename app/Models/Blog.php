<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $table = 'blogs';
    protected $fillable = ['title', 'image', 'category_id', 'user_id', 'slug', 'sort_description', 'description','views_count'];

    public function category(){
        return $this->hasOne(Category::class,'id','category_id');
    }

    public function user(){
        return $this->hasOne(User::class,'id','user_id');
    }
}
