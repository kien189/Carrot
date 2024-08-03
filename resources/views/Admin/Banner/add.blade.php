@extends('Admin.master')
@section('main_admin')
    <base href="/">
    <!-- main content -->
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
                            <form action="{{ route('banners.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row cr-product-uploads">
                                    <div class="col-lg-4 mb-991">
                                        <div class="cr-vendor-img-upload">
                                            <div class="cr-vendor-main-img">

                                                <div class="avatar-upload">
                                                    <div class="avatar-edit">
                                                        <input type='file' id="product_main" class="cr-image-upload"
                                                            multiple accept=".png, .jpg, .jpeg" name="photo">
                                                        <label><i class="ri-pencil-line"></i></label>
                                                    </div>
                                                    <div class="avatar-preview cr-preview">
                                                        <div class="imagePreview cr-div-preview">
                                                            <img class="cr-image-preview"
                                                                src="{{ asset('assets_ad') }}/img/product/preview.jpg"
                                                                alt="edit">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="cr-vendor-upload-detail ">
                                            <div class="row g-3">
                                                <div class="col-md-6">
                                                    <label for="inputEmail4" class="form-label">Title Banner</label>
                                                    <input type="text" class="form-control slug-title" name="title"
                                                       >
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Content Banner</label>
                                                    <input type="text" class="form-control slug-title" name="content">
                                                </div>
                                            </div>
                                            <div class="col-md-12 pb-4">
                                                <label class="form-label">Short Title Banner</label>
                                                <textarea class="form-control" id="editor1" name="message" rows="4"></textarea>
                                            </div>
                                            <div class="col-md-12">
                                                <button type="submit" class="btn cr-btn-primary">Submit</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

