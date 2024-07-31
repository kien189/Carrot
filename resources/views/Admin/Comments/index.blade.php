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
                                            <th>Số lượng comment</th>
                                            <th>Trung bình </th>
                                            <th>Chi tiết</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($productsWithcomment as $value)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $value->name }}</td>
                                                <td>{{ $value->ratings->count() }}</td>
                                                <td>
                                                    @php
                                                        $rating = $value->averageRating();
                                                        $fullStars = floor($rating);
                                                        $halfStar = ceil($rating - $fullStars);
                                                        $emptyStars = 5 - $fullStars - $halfStar;
                                                    @endphp
                                                    @for ($i = 0; $i < $fullStars; $i++)
                                                        <i class="ri-star-fill" style="color:#f5885f"></i>
                                                    @endfor
                                                    @if ($halfStar)
                                                        <i class="ri-star-half-line"></i>
                                                    @endif
                                                    @for ($i = 0; $i < $emptyStars; $i++)
                                                        <i class="ri-star-line"></i>
                                                    @endfor
                                                </td>
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
                                                            href="{{ route('showComments', $value->id) }}">Chi tiết </a>
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
