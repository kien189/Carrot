<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coupon = coupon::orderBy('id', 'desc')->paginate();
        return view('Admin.Coupon.index', compact('coupon'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.Coupon.creat');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $coupon = coupon::create($request->all());
            return redirect()->route('coupon.index')->with('success', 'Thêm mã giảm giá thành công !!');
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return redirect()->back()->with('error', 'Thêm mã giảm giá thất bại ');
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
    public function edit(string $id)
    {
        $coupon = coupon::findOrFail($id)->first();
        return view('Admin.Coupon.edit', compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $coupon_update = coupon::findOrFail($id)->update($request->all());
            return redirect()->route('coupon.index')->with('success', 'Cập nhật mã giảm giá thành công !');
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return redirect()->back()->with('error', 'Cập nhật mã giảm giá không thành công');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $coupon_delete = coupon::findOrFail($id)->delete();
            return redirect()->route('coupon.index')->with('success', 'Xóa mã giảm giá thành công !');
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return redirect()->back()->with('error', 'Xóa mã giảm giá không thành công');
        }
    }
}
