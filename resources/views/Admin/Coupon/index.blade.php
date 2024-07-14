@extends('Admin.master')
@section('main_admin')
    <div class="cr-main-content">
        <div class="container-fluid">
            <!-- Page title & breadcrumb -->
            <div class="cr-page-title cr-page-title-2">
                <div class="cr-breadcrumb">
                    <h5>Danh sách mã giảm giá</h5>
                    <ul>
                        <li><a href="{{ route('admin.index') }}">Carrot</a></li>
                        <li>Danh sách mã giảm giá</li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="cr-card card-default product-list">
                        <div class="cr-card-content ">
                            <div class="table-responsive">
                                <a class="btn btn-light " href="{{ route('coupon.create') }}">+ Add new coupon</a>
                                <table id="product_list" class="table" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tên mã giảm giá</th>
                                            <th>Mã giảm giá</th>
                                            <th>Phương thức giảm</th>
                                            <th>Giá giảm</th>
                                            <th>Số lượng</th>
                                            <th>Ngày tạo</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($coupon as $value)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $value->coupon_name }}</td>
                                                <td>{{ $value->coupon_code }}</td>
                                                <td>
                                                    @if ($value->coupon_condition == 1)
                                                        <p>Mã giảm giá %</p>
                                                    @elseif($value->coupon_condition == 2)
                                                        <p>Mã giảm giá tiền </p>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($value->coupon_condition == 1)
                                                        {{ $value->coupon_number }}%
                                                    @elseif($value->coupon_condition == 2)
                                                        {{ number_format($value->coupon_number) }}đ
                                                    @endif
                                                </td>
                                                <td>{{ $value->coupon_quantity }}</td>
                                                <td>{{ $value->created_at->format('d/m/y') }}</td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <button type="button"
                                                            class="btn btn-outline-success dropdown-toggle dropdown-toggle-split"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false" data-display="static">
                                                            <span class=""><i class="ri-settings-3-line"></i></span>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item"
                                                                href="{{ route('coupon.edit', $value->id) }}">Edit</a>
                                                            <form action="{{ route('coupon.destroy', $value->id) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="dropdown-item">Delete</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
