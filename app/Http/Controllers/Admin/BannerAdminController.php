<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Services\ImageUploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $banner = Banner::all();
        return view('Admin.Banner.index', compact('banner'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.Banner.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, ImageUploadService $imageUploadService)
    {
        try {
            $fileName = $imageUploadService->handleImageUploadAndMerge($request, 'public/banners','photo');
            $banner = Banner::create($request->all());
            return redirect()->route('banners.index')->with('success', 'Tạo mới banner thành công');
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return back()->with('error', 'Thêm mới banner thất bại . Vui lòng kiểm tra thông tin !');
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
    public function edit(Banner $banner)
    {
        $banner = Banner::find($banner->id);
        return view('Admin.Banner.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Banner $banner, ImageUploadService $imageUploadService)
    {
        // dd($request->all());
        try {
            $this->imageUploadService->updateImage($request, $banner, 'public/banners','photo');
            $banner = Banner::find($banner->id)->update($request->all());
            return redirect()->route('banners.index')->with('success', 'Cập nhật banner thành công');
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return back()->with('error', 'Cập nhật banner không thành công !!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banner $banner)
    {
        try {
            $banner = Banner::find($banner->id)->delete();
            return back()->with('success', 'Xóa banner thành công .');
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return back()->with('error', 'Xóa không thành công !');
        }
    }
}
