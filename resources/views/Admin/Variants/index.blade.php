@extends('Admin.master')
@section('main_admin')
    <base href="/">
    <!-- main content -->
    <div class="cr-main-content">
        <div class="container-fluid">
            <!-- Page title & breadcrumb -->
            <div class="cr-page-title cr-page-title-2">
                <div class="cr-breadcrumb">
                    <h5>Product List</h5>
                    <ul>
                        <li><a href="index.html">Carrot</a></li>
                        <li>Product List</li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="cr-card card-default product-list">
                        <div class="cr-card-content ">
                            <div class="table-responsive">
                                <table id="product_list" class="table" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Product</th>
                                            <th>Name</th>
                                            <th>Variants</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($products as $value)
                                            <tr>
                                                <td>{{ $loop->index + 1}}</td>
                                                <td><img class="tbl-thumb"
                                                        src="{{ asset('storage/images/' . $value->image) }}"
                                                        alt="Product Image">
                                                </td>
                                                <td>{{ $value->name }}</td>
                                                <td class="text-center">{{ $value->variants->count() }}</td>
                                                @if ($value->status == 0)
                                                    <td><span class="active">active</span></td>
                                                @elseif ($value->status == 1)
                                                    <td><span class="active text-danger">hidden</span></td>
                                                @endif

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
                                                            <a class="dropdown-item" href="">Edit</a>
                                                            <a class="dropdown-item" href="#">Delete</a>
                                                            <a class="dropdown-item"
                                                                href="{{ route('variants.show', $value->id) }}">View</a>
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
