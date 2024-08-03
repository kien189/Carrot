@extends('Admin.master')
@section('main_admin')
    <div class="cr-main-content">
        <div class="container-fluid">
            <!-- Page title & breadcrumb -->
            <div class="cr-page-title cr-page-title-2">
                <div class="cr-breadcrumb">
                    <h5>Order List</h5>
                    <ul>
                        <li><a href="index.html">Carrot</a></li>
                        <li>Order List</li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="cr-card" id="ordertbl">
                        <div class="cr-card-header">
                            <h4 class="cr-card-title">Recent Orders</h4>
                            <div class="header-tools">
                                <a href="{{ route('blog.create') }}" class="m-r-10 w-50 cr-full-card"><i
                                        class="ri-add-line"></i>ADD</a>
                                <a href="javascript:void(0)" class="m-r-10 cr-full-card"><i
                                        class="ri-fullscreen-line"></i></a>
                                <div class="cr-date-range dots">
                                    <span></span>
                                </div>
                            </div>
                        </div>
                        <div class="cr-card-content card-default">
                            <div class="order-table">
                                <div class="table-responsive tbl-1200">
                                    <table id="recent_order" class="table">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Ảnh</th>
                                                <th>Tiêu đề</th>
                                                <th>Danh mục</th>
                                                <th>Người viết</th>
                                                <th>Lượt xem </th>
                                                <th>Trạng thái</th>
                                                <th>Bình luận </th>
                                                <th>Chức năng </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($blog as $value)
                                                <tr>
                                                    <td class="token">{{ $loop->index + 1 }}</td>
                                                    <td><img class=""
                                                            src="{{ asset('storage/blogs/' . $value->image) }}"
                                                            width="120px" alt="clients Image">
                                                    </td>
                                                    <td>{{ $value->title }}</td>
                                                    <td>{{ $value->category->name }}</td>
                                                    <td>{{ $value->user->name }}</td>
                                                    <td>{{ $value->views_count }}</td>
                                                    <td>Active</td>
                                                    <td>65</td>
                                                    <td class="cod">
                                                        <div class="d-flex justify-content-center">
                                                            <button type="button"
                                                                class="btn btn-outline-success dropdown-toggle dropdown-toggle-split"
                                                                data-bs-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false" data-display="static">
                                                                <span class=""><i
                                                                        class="ri-settings-3-line"></i></span>
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item"
                                                                    href="{{ route('blog.edit', $value->id) }}">Edit</a>
                                                                <form action="{{ route('blog.destroy', $value->id) }}" method="post">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    <button type="submit" class="dropdown-item" >Delete</button>
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
    </div>
@endsection
