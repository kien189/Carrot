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
                                            <th>Tên sản phẩm</th>
                                            <th>Người bình luận </th>
                                            <th>Nội dung </th>
                                            <th>Đánh giá </th>
                                            <th>Ngày bình luận</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($comments as $value)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $value->products->name }}</td>
                                                <td>{{ $value->customers->name }}</td>
                                                <td>{{ $value->content }}</td>
                                                <td>
                                                    <div class="cr-t-review-rating">
                                                        @for ($i = 0; $i < $value->rating; $i++)
                                                        <i class="ri-star-fill" style="color:#f5885f"></i>
                                                        @endfor
                                                        @for ($i = $value->rating; $i < 5; $i++)
                                                        <i class="ri-star-line"></i>
                                                        @endfor
                                                    </div>
                                                </td>
                                                <td>{{ $value->created_at->format('d-m-y') }}</td>
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
