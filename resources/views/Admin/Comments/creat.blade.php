@extends('Admin.master')
@section('main_admin')
    <base href="/">
    <div class="cr-main-content">
        <div class="container-fluid">
            <!-- Page title & breadcrumb -->
            <div class="cr-page-title cr-page-title-2">
                <div class="cr-breadcrumb">
                    <h5>Add Product</h5>
                    <ul>
                        <li><a href="index.html">Carrot</a></li>
                        <li>Add Product</li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="cr-card card-default">
                        <div class="cr-card-content">
                            <div class="row cr-product-uploads">
                                <div class="col-lg-12">
                                    <div class="cr-vendor-upload-detail">
                                        <form class="row g-3" action="{{ route('coupon.store')}}" method="post">
                                            @csrf
                                            <div class="col-md-12">
                                                <label for="inputEmail4" class="form-label">Tên mã giảm giá</label>
                                                <input type="text" class="form-control slug-title" id="inputEmail4"
                                                    name="coupon_name">
                                            </div>
                                            <div class="col-md-12">
                                                <label for="inputEmail4" class="form-label">Mã giảm giá</label>
                                                <input type="text" class="form-control slug-title" id="inputEmail4"
                                                    name="coupon_code">
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label">Phương thức</label>
                                                <select class="form-control form-select" name="coupon_condition">
                                                    <option value="0">---Lựa chọn---</option>
                                                    <option value="1">Giảm giá theo %</option>
                                                    <option value="2">Giảm theo giá tiền</option>
                                                </select>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="slug" class="col-12 col-form-label">Nhập số % hoặc số
                                                    tiền</label>
                                                <div class="col-12">
                                                    <input id="slug" name="coupon_number"
                                                        class="form-control here set-slug" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="slug" class="col-12 col-form-label">Số lượng</label>
                                                <div class="col-12">
                                                    <input id="slug" name="coupon_quantity"
                                                        class="form-control here set-slug" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <button type="submit" class="btn cr-btn-primary">Thêm mới mã giảm giá</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
