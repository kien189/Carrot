<?php

namespace App\Models;

use App\Mail\MailOrder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Oder_detail extends Model
{
    use HasFactory;
    protected $table = 'order_detail';
    protected $fillable = ['name', 'email', 'phone', 'address', 'customer_id', 'status', 'note', 'totalPrice', 'token'];

    public function customers()
    {
        return $this->belongsTo(Customers::class, 'customer_id', 'id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'order_id', 'id');
    }

    public function shipment_detail()
    {
        return $this->hasOne(ShipmentOrder::class, 'order_id', 'id');
    }

    public function coupon_order()
    {
        return $this->hasMany(CouponsOrder::class, 'order_id', 'id');
    }

    // Các thuộc tính và phương thức của model

    public static function createOrder($req)
    {
        $orderDetail = self::create($req->all());
        $customerId = auth('customers')->id();

        // Create orders, shipment and coupons
        self::createOrders($orderDetail->id, $customerId);
        self::createShipmentOrder($orderDetail->id, $req);
        self::sendOrderMail($orderDetail, $req->email);
        self::clearCart($customerId);

        return $orderDetail;
    }

    protected static function createOrders($orderId, $customerId)
    {
        $cartItems = Cart::where('customer_id', $customerId)->get();

        foreach ($cartItems as $item) {
            self::createOrderItem($orderId, $customerId, $item);
        }

        self::createCouponOrders($orderId);
    }

    protected static function createOrderItem($orderId, $customerId, $item)
    {
        $data = [
            'customer_id' => $customerId,
            'product_id' => $item->product_id,
            'order_id' => $orderId,
            'variant_id' => $item->variant_id,
            'quantity' => $item->quantity,
        ];
        Order::create($data);
    }

    protected static function createCouponOrders($orderId)
    {
        $coupons = Session::get('coupons', []);
        $couponData = [];

        foreach ($coupons as $coupon) {
            $couponData[] = [
                'coupon_id' => $coupon->id,
                'order_id' => $orderId,
            ];
        }

        foreach ($couponData as $data) {
            CouponsOrder::create($data);
        }
    }

    protected static function createShipmentOrder($orderId, $req)
    {
        $data = [
            'code_orders' => Str::random(10),
            'order_id' => $orderId,
            'payment_id' => $req->payment_id,
            'delivery_id' => $req->delivery_id,
        ];
        // dd($data);
        ShipmentOrder::create($data);
    }

    protected static function sendOrderMail($orderDetail, $email)
    {
        Mail::to($email)->queue(new MailOrder($orderDetail));
    }

    protected static function clearCart($customerId)
    {
        Cart::where('customer_id', $customerId)->delete();
        Session::forget('coupons');
    }
}
