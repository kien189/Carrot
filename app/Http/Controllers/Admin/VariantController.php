<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVariants;
use Illuminate\Http\Request;

class VariantController extends Controller
{
    public function index(Product $product)
    {
        $products = Product::orderBy('id', 'desc')->get();
        return view('Admin.Variants.index', compact('products'));
    }

    public function show($id)
    {
        $variants =ProductVariants::where('product_id',$id)->get();
        return view('Admin.Variants.show',compact('variants'));
    }
}
