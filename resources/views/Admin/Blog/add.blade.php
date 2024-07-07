@extends('Admin.master')
@section('main_admin')
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
                            <form class="row g-3" action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
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
                                        <div class="cr-vendor-upload-detail">

                                            <div class="d-flex gap-2">


                                                <div class="col-md-6">
                                                    <label for="inputEmail4" class="form-label">Tiêu đề</label>
                                                    <input name="title" class="form-control here set-slug" type="text" onkeyup="ChangeToSlug()" id="NamePro">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Chọn danh mục</label>
                                                    <select class="form-control form-select " name="category_id">
                                                        @foreach ($cate as $item)
                                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="slug" class="col-12 col-form-label">Slug</label>
                                                <div class="col-12">
                                                    <input id="slug" name="slug" class="form-control here set-slug"
                                                        type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label">Mô tả ngắn</label>
                                                <textarea class="form-control" id="editor2" name="sort_description" rows="2"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 pb-4">
                                        <label class="form-label">Mô tả</label>
                                        <textarea class="form-control w-100" name="description" id="editor1" rows="5"></textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn cr-btn-primary">Submit</button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
