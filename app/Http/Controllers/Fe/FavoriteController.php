<?php

namespace App\Http\Controllers\Fe;

use App\Models\Product;
use App\Models\Favorite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FavoriteController extends Controller
{
    public function index()
    {
        return view('Fe.WishList.index');
    }

    public function addFavorite(Product $product)
    {
        try {
            $data = [
                'customer_id' => auth('customers')->id(),
                'product_id'  => $product->id,
            ];

            Favorite::create($data);
            return redirect()->back()->with('success', 'Thêm sản phẩm yêu thích thành công ');
        } catch (\Throwable $th) {
            //throw $th;
            dd($th->getMessage());
            return redirect()->back()->with('success', 'Thêm sản phẩm yêu thích thành công ');
        }
    }


    public function deleteWishList($id)
    {
        try {
            $favorite = Favorite::findOr($id)->delete();
            return redirect()->route('home')->with('success','Xoá thành công');
        } catch (\Throwable $th) {
            return redirect()->route('home')->with('success','Xoá không thành công');
        }
    }
}
