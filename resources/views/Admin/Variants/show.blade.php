@extends('Admin.master')
@section('main_admin')
    <base href="/">
    <!-- main content -->
    <div class="cr-main-content">
        <div class="container-fluid">
            <!-- Page title & breadcrumb -->
            <div class="cr-page-title cr-page-title-2">
                <div class="cr-breadcrumb">
                    <h5>Danh sách biến thể </h5>
                    <ul>
                        <li><a href="{{ route('admin.index') }}">Carrot</a></li>
                        <li>Danh sách biến thể </li>
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
                                            <th>Price</th>
                                            <th>Sale Price</th>
                                            <th>Size</th>
                                            <th>Quantity </th>
                                            <th>Status </th>
                                            <th>Date</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($variants as $value)
                                            <tr>
                                                <td class="tbl-thumb">{{ $loop->index + 1 }}
                                                </td>
                                                <td>{{ number_format($value->price) }}đ</td>
                                                <td>{{ number_format($value->sale_price) }}đ </td>
                                                <td>{{ $value->size }}</td>
                                                <td>{{ $value->quantity }}</td>
                                                @if ($value->quantity > 5)
                                                    <td><span class="active">stocking</span></td>
                                                @elseif ($value->quantity < 5)
                                                    <td><span class="active text-danger">out of stock</span></td>
                                                @endif
                                                <td>{{ $value->created_at->format('d-m-Y') }}</td>
                                                <td class="">
                                                    <div class="d-flex justify-content-center ">
                                                        <button type="button"
                                                            class="btn btn-outline-success dropdown-toggle dropdown-toggle-split"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false" data-display="static">
                                                            <span class=""><i class="ri-settings-3-line"></i></span>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item"
                                                                href="{{ route('variants.edit', $value->id) }}">Edit</a>
                                                            <form action="{{ route('variants.destroy', $value->id) }}"
                                                                method="post">
                                                                @method('DELETE')
                                                                @csrf
                                                                <button class="dropdown-item" type="submit">Delete</button>
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
