<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVariants;
use Illuminate\Http\Request;

class ProductVariantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ProductVariants $variants)
    {
        $variants = Product::all();
        return view('Admin.Variants.index', compact('variants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Product $variant)
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req, Product $product)
    {
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $variants = ProductVariants::where('product_id', $id)->get();
        return view('Admin.Variants.show', compact('variants'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $editVariant = ProductVariants::find($id);
        return view('Admin.Variants.edit', compact('editVariant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, $id)
    {
        try {
            $variant = ProductVariants::findOrFail($id);
            $variants = [
                "size" => $req->size,
                "price" => $req->price,
                "sale_price" => $req->sale_price,
                "quantity" => $req->quantity
            ];
            $variant->update($variants);
            return redirect()->route('variants.show', $variant->product_id)->with('success', 'Cập nhật biến thể thành công !');
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return redirect()->back()->with('eror', 'Cập nhật biến thể thất bại !');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $variant = ProductVariants::find($id);
            $variant->delete();
            return redirect()->route('variants.show', $variant->product_id)->with('success', 'Cập nhật biến thể thành công !');
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }

    public function add($id)
    {
        $variants = Product::find($id);
        return view('Admin.Variants.add', compact('variants'));
    }

    public function postAdd($id, Request $req)
    {
        try {
            $product_id = Product::find($id);
            foreach ($req->variants as $variantData) {
                $variants = [
                    "size" => $variantData['size'],
                    "price" => $variantData['price'],
                    "sale_price" => $variantData['sale_price'],
                    "quantity" => $variantData['quantity']
                ];
                $product_id->variants()->create($variants);
            }
            return redirect()->route('variants.index');
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return redirect()->back();
        }
    }
}
