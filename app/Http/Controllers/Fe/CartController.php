<?php

namespace App\Http\Controllers\Fe;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index(Request $request)
    {
        // $request->session()->forget('coupons');
        // $session = Session::get('coupons');
        // dd($session);
        $cart = Cart::all();
        return view('Fe.Car.cartIdex');
    }
    public function addToCart(Request $req, Product  $product)
    {
        $customer_id = auth('customers')->id();
        if (!$this->exitAddToCart($req, $product)) {
            $data = array_merge(
                ['customer_id' => $customer_id, 'product_id' => $product->id],
                $req->only('variant_id', 'quantity')
            );
            Cart::create($data);
            return redirect()->back();
        }
        return redirect()->back();
    }

    public function exitAddToCart(Request $req, Product $product)
    {
        $cartItem = Cart::where(['product_id' => $product->id, 'variant_id' => $req->variant_id])
            ->where('customer_id', auth('customers')->id())->first();
        if ($cartItem) {
            $cartItem->quantity += $req->quantity;
            $cartItem->save();
            return true;
        }
        return false;
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

    // public function deleteCart($id)
    // {
    //     try {
    //         $cartItem = Cart::findOrFail($id); // Tìm mục trong cơ sở dữ liệu

    //         $cartItem->delete(); // Xóa mục

    //         return response()->json(['success' => true, 'message' => 'Xóa sản phẩm thành công']);
    //     } catch (\Exception $e) {
    //         return response()->json(['success' => false, 'message' => 'Lỗi xóa sản phẩm: ' . $e->getMessage()], 500);
    //     }
    // }

    public function deleteCart($id)
    {
        try {
            $deleteCart = Cart::findOrFail($id)->delete();
            return back();
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }
}
