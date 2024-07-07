<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = ['name', 'slug', 'image', 'sortdescription', 'description', 'category_id', 'variants_id', 'status'];

    public function category()
    {
        return $this->hasOne(Category::class,'id','category_id');
    }

    // public function category()
    // {
    //     return $this->belongsTo(Category::class, 'category_id');
    // }
    public function images()
    {
        return $this->hasMany(ProductImages::class);
    }

    public function variants()
    {
        return $this->hasMany(ProductVariants::class, 'product_id','id');
    }
    public function ratings()
    {
        return $this->hasMany(Comment::class, 'product_id','id');
    }

    public function averageRating()
    {
        $ratings = $this->ratings()->pluck('rating')->toArray();
        $totalRatings = count($ratings);

        if ($totalRatings > 0) {
            $sum = array_sum($ratings);
            return round($sum / $totalRatings, 1); // Lấy trung bình cộng với một chữ số thập phân
        }

        return 0; // Trả về 0 nếu không có đánh giá nào
    }
}
