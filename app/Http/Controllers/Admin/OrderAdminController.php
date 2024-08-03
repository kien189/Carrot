<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Oder_detail;

class OrderAdminController extends Controller
{
    public function index()
    {
        $order_details = Oder_detail::orderBy('id', 'asc')->get();
        return view('Admin.Orders.index', compact('order_details'));
    }

    public function show(string $id)
    {
        $detailOrder = Oder_detail::where('id', $id)->first();
        // dd($detailOrder);
        $orders = Order::where('order_id', $id)->get();
        // dd($orders);
        return view('Admin.Orders.show', compact('detailOrder', 'orders'));
    }

    // public function updateOrder(Request $req, $id)
    // {
    //     try {
    //         $updateOrder = Oder_detail::find($id);
    //         $statusInput = $req->input('status');
    //         $updateOrder->status = $statusInput;
    //         $updateOrder->save();
    //         return back()->with('success','Cập nhật trạng thái thành công');
    //     } catch (\Throwable $th) {
    //         return back()->with('error','Cập nhật trạng thái không thành công!!!');
    //     }
    // }
    public function updateOrder(Request $req, $id)
    {
        try {
            $updateOrder = Oder_detail::find($id);
            $statusInput = $req->input('status');
            $updateOrder->status = $statusInput;
            $updateOrder->save();
            return response()->json(['success' => 'Cập nhật trạng thái thành công'], 200);
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Cập nhật trạng thái không thành công'], 500);
        }
    }
}
