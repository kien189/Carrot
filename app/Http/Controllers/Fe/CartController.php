<?php

namespace App\Http\Controllers\Fe;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(){
        $cart = Cart::all();
        return view('Fe.Car.cartIdex');
    }
    public function addToCart(Request $req, Product  $product)
    {
        $customer_id = auth('customers')->id();
        $data = [
            "customer_id" => $customer_id,
            "product_id" => $product->id,
            "variant_id" => $req->input('variant_id'),
            "quantity" => $req->input('quantity')
        ];
        Cart::create($data);
        return redirect()->back();
    }

    public function updateCart(Request $request)
    {
        $cart = Cart::find($request->id);
        if ($cart) {
            $cart->quantity = $request->quantity;
            $cart->save();
            return response()->json(['success' => true, 'message' => 'Cập nhật giỏ hàng thành công']);
        } else {
            return response()->json(['success' => false, 'message' => 'Không tìm thấy giỏ hàng'], 404);
        }
    }
}
