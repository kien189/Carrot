<?php

namespace App\Http\Controllers\Fe;

use App\Models\Cart;
use App\Models\coupon;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CheckoutController extends Controller
{
    public function checkout()
    {
        $cart = Cart::where('customer_id',auth('customers')->id())->get();
        return view('Fe.Car.checkOut',compact('cart'));
    }

    public function checkCoupon(Request $req)
    {
        $couponValue = $req->input('couponInput');
        $coupon = coupon::where('coupon_code',$couponValue)->first();
    }
}
