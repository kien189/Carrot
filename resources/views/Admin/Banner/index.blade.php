@extends('Admin.master')
@section('main_admin')
    <base href="/">
    <!-- main content -->
    <div class="cr-main-content">
        <div class="container-fluid">
            <!-- Page title & breadcrumb -->
            <div class="cr-page-title cr-page-title-2">
                <div class="cr-breadcrumb">
                    <h5>Banner List</h5>
                    <ul>
                        <li><a href="index.html">Carrot</a></li>
                        <li>Banner List</li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="cr-card card-default product-list">
                        <div class="cr-card-content ">
                            <div class="table-responsive">
                                <a class="btn btn-light " href="{{ route('product.create') }}">+ Add new banner</a>
                                <table id="product_list" class="table pt-4" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Banner</th>
                                            <th>Title Banner</th>
                                            <th>Content Banner</th>
                                            <th>Short Title Banner</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($banner as $value)
                                            <tr>
                                                <td><img src="{{ asset('storage/banners/'.$value->image) }}"
                                                        alt="Product Image"></td>
                                                <td>{{ $value->title }}</td>
                                                <td>{{ $value->content }}</td>
                                                <td>{!! $value->message !!}</td>
                                                <td><span class="active">active</span></td>
                                                <td>{{ $value->created_at->format('d-m-Y') }}</td>
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
                                                                href="{{ route('banners.edit', $value->id) }}">Edit</a>
                                                            <form action="{{ route('banners.destroy', $value->id) }}" method="post">
                                                                @method('DELETE')
                                                                @csrf
                                                                <button onclick="return confirm('Bạn có chắc chắn xóa không ?')" type="submit" class="dropdown-item">Delete</button>
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
