@extends('Admin.master')
@section('main_admin')
    <div class="cr-main-content">
        <div class="container-fluid">
            <!-- Page title & breadcrumb -->
            <div class="cr-page-title cr-page-title-2">
                <div class="cr-breadcrumb">
                    <h5>Danh sách bình luận </h5>
                    <ul>
                        <li><a href="{{ route('admin.index') }}">Carrot</a></li>
                        <li>Danh sách bình luận</li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="cr-card card-default product-list">
                        <div class="cr-card-content ">
                            <div class="table-responsive">
                                {{-- <a class="btn btn-light " href="{{ route('coupon.create') }}">+ Add new coupon</a> --}}
                                <table id="product_list" class="table" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tên người đặt</th>
                                            <th>Địa chỉ</th>
                                            <th>Số điện thoại</th>
                                            <th>Tổng tiền </th>
                                            <th>Trạng thái </th>
                                            <th>Ngày đặt </th>
                                            <th>Chi tiết</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($order_details as $value)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $value->name }}</td>
                                                <td>{{ $value->address }}</td>
                                                <td>{{ $value->phone }}</td>
                                                <td>{{ number_format($value->totalPrice) }}đ</td>
                                                <td> {{ $status[$value->status] ?? 'Không xác định' }}</td>
                                                <td>{{ $value->created_at->format('d-m-y') }}</td>
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
                                                            href="{{ route('admin.order.show', $value->id) }}">Chi tiết </a>
                                                            {{-- <form action="{{ route('coupon.destroy', $value->id) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="dropdown-item">Delete</button>
                                                            </form> --}}
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
