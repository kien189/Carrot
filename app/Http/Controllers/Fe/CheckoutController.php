<?php

namespace App\Http\Controllers\Fe;

use App\Models\Cart;
use App\Models\coupon;
use App\Models\Product;
use App\Models\Oder_detail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\MailOrder;
use App\Models\Order;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function checkout(Request $request)
    {
        // $session = Session::get('coupons');
        // dd($session);
        $account = auth('customers')->user();
        $cart = Cart::where('customer_id', auth('customers')->id())->get();
        if ($cart->isEmpty()) {
            $totalPrice = 0;
        } else {
            $totalPrice = $cart->sum(function ($item) {
                return $item->variants->sale_price * $item->quantity;
            });
        }
        return view('Fe.Car.checkOut', compact('cart', 'totalPrice', 'account'));
    }

    // public function checkCoupon(Request $req)
    // {
    //     $couponValue = $req->input('couponInput');
    //     $coupons = Session::get('coupons', []);
    //     $coupon = Coupon::where('coupon_code', $couponValue)->first();

    //     if ($coupon) {
    //         // Kiểm tra xem mã giảm giá đã tồn tại trong danh sách chưa
    //         $exists = false;
    //         foreach ($coupons as $existingCoupon) {
    //             if ($existingCoupon->id === $coupon->id) {
    //                 $exists = true;
    //                 break;
    //             }
    //         }
    //         if (!$exists) {
    //             $coupons[] = $coupon;
    //             Session::put('coupons', $coupons);
    //         }
    //     } else {
    //         return Redirect::back()->withInput()->withErrors(['coupon' => 'Invalid coupon code']);
    //     }

    //     // Redirect back with the updated coupons list
    //     return Redirect::back()->withInput();
    // }




    public function checkCoupon(Request $req)
    {

        $couponValue = $req->input('couponInput');
        $coupon = Coupon::where('coupon_code', $couponValue)->first();
        if (!$coupon) {
            return Redirect::back()->withInput()->withErrors(['coupon' => 'Invalid coupon code']);
        }
        // Lấy danh sách các mã giảm giá đã lưu trong session, mặc định là một mảng rỗng nếu không tồn tại
        $coupons = Session::get('coupons', []);
        // Kiểm tra xem mã giảm giá đã được áp dụng trước đó chưa
        foreach ($coupons as $existingCoupon) {
            if ($existingCoupon->id === $coupon->id) {
                // Nếu đã áp dụng rồi, redirect về trang trước đó và thông báo lỗi 'Coupon already applied'
                return Redirect::back()->withInput()->withErrors(['coupon' => 'Coupon already applied']);
            }
        }
        // Nếu chưa áp dụng, thêm mã giảm giá vào danh sách
        $coupons[] = $coupon;
        // Lưu danh sách mã giảm giá mới vào session
        Session::put('coupons', $coupons);
        // Redirect về trang trước đó và kèm theo input đã nhập
        // $req->session()->flush();
        // $session = Session::get('coupon');
        return Redirect::back()->with('success', 'Áp mã thành công !');
    }

    public function cash(Request $req)
    {
        try {
            if ($order_detail = Oder_detail::create($req->all())) {
                $couponId = optional(Session::get('coupons')[0] ?? null)->id;
                $cart = Cart::where('customer_id', auth('customers')->id())->get();

                foreach ($cart as $value) {
                    $data1 = [
                        'customer_id' => auth('customers')->id(),
                        'product_id' => $value->product_id,
                        'order_id' => $order_detail->id,
                        'variant_id' => $value->variant_id, // Đảm bảo sử dụng đúng tên trường
                        'quantity' => $value->quantity,
                        'coupon_id' => $couponId,
                        'totalPrice' => $value->quantity * $value->variants->sale_price,
                    ];
                    // dd($data1);
                    $order = Order::create($data1);
                    Mail::to($req->email)->queue(new MailOrder($order_detail));
                }
                // Cart::where('customer_id', auth('customers')->id())->delete();
                $req->session()->forget('coupons');
            }
            // return redirect()->route('home')->with('success', 'Đặt hàng thành công');
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return redirect()->back()->with('error', 'Đặt hàng không thành công');
        }
    }
}
