<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\Customers;
use App\Models\Oder_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    // public function index()
    // {
    //     $count_customer = Customers::count();
    //     $count_order = Oder_detail::count();
    //     $totalPrice = Order::sum('totalPrice');
    //     $revenue = Order::select(DB::raw('SUM(totalPrice) as total'), DB::raw('MONTH(created_at) as month'))
    //     ->groupBy('month')
    //     ->orderBy('month')
    //     ->pluck('total', 'month')->toArray();
    //     return view('Admin.index', compact('count_customer', 'count_order','totalPrice'));
    // }
    public function index()
    {
        $count_customer = Customers::count();
        $count_order = Oder_detail::count();
        $totalPrice = Order::sum('totalPrice');
        return view('Admin.index', compact('count_customer', 'count_order', 'totalPrice'));

    }

    public function getStatistics()
    {
        $revenue = Order::select(DB::raw('SUM(totalPrice) as total'), DB::raw('MONTH(created_at) as month'))
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('total', 'month')
            ->toArray();

        $orders = Oder_detail::select(DB::raw('COUNT(id) as total'), DB::raw('MONTH(created_at) as month'))
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('total', 'month')
            ->toArray();
        $revenue = $this->fillMissingMonths($revenue);
        $orders = $this->fillMissingMonths($orders);

        return response()->json([
            'revenue' => array_values($revenue),
            'orders' => array_values($orders),
        ]);
    }

    private function fillMissingMonths($data)
    {
        // Tạo mảng với các chỉ số từ 1 đến 12, tất cả đều được gán giá trị 0
        $result = array_fill(1, 12, 0);

        // Duyệt qua dữ liệu hiện có
        foreach ($data as $month => $value) {
            // Cập nhật mảng kết quả với giá trị tương ứng cho từng tháng
            $result[(int)$month] = $value;
        }

        // Trả về mảng kết quả đã được điền đầy đủ tháng
        return $result;
    }

    public function newcampaignsChart()
    {

    }

}
