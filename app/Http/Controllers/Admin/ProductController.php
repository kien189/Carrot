<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::orderBy('id', 'asc')->get();
        return view('Admin.Products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Category $category)
    {
        $cate = Category::where('parent_id', '=', $category->parent_id)->get();
        return view('Admin.Products.add', compact('cate'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {
        $fileName = $req->photo->getClientOriginalName();
        $req->photo->storeAs('public/images', $fileName);
        $req->merge(['image' => $fileName]);
        try {
            $products = Product::create($req->all());
            if ($products && $req->hasFile("photos")) {
                foreach ($req->photos as $key => $value) {
                    $fileNames = $value->getClientOriginalName();
                    $value->storeAs("public/images", $fileNames);
                    ProductImages::create([
                        "product_id" => $products->id,
                        "image" => $fileNames
                    ]);
                }
            }
            foreach ($req->variants as $variantData) {
                $variants = [
                    "size" => $variantData['size'],
                    "price" => $variantData['price'],
                    "sale_price" => $variantData['sale_price'],
                    "quantity" => $variantData['quantity']
                ];
                $products->variants()->create($variants);
            }

            return Redirect::route('product.index')->with('success', 'Thêm mới sản phẩm thành công');
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return Redirect::back()->with('error', 'Thêm mới sản phẩm thất bại !!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id, Category $category)
    {
        $cate = Category::where('parent_id', '=', $category->parent_id)->get();
        $product = Product::find($id);
        $image = ProductImages::where('product_id', $id)->get();
        // dd($image);
        return view("Admin.Products.edit", compact('cate', 'product', 'image'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, Product $product)
    {
        // dd($req->all());
        $product->update($req->all());

        if ($req->hasFile('photo')) {
            if ($product->image) {
                Storage::delete('public/images/' . $product->image);
            }

            $fileName = $req->photo->getClientOriginalName();
            $req->photo->storeAs('public/images', $fileName);
            $product->image = $fileName;
            $product->save();
        }

        if ($req->hasFile('photos')) {
            foreach ($req->photos as  $imageId => $photo) {
                $imageId = ProductImages::find($imageId);
                if ($imageId->id) {
                    Storage::delete('public/images/' . $imageId->image);
                }
                    $fileNames = $photo->getClientOriginalName();
                    $photo->storeAs('public/images', $fileNames);
                    $imageId->update([
                        "image" => $fileNames
                    ]);

            }
        }
        return redirect()->route('product.index')->with('sucess', 'Cập nhật sản phẩm thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function destroyImage(Request $req, ProductImages $images)
    {
        $image = $images->image;
        $image->delete();
        if ($req->hasFile('photos')) {
            foreach ($req->photos as $photo) {
                $fileName = $photo->getClientOriginalName();
                $photo->storeAs('public/images', $fileName);
            }
            Storage::delete('public/images/' . $image);
        }
    }
}
