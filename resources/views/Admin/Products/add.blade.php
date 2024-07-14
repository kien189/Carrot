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
                            <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
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
                                                <div class="thumb-upload-set colo-md-12">
                                                    <div class="thumb-upload">
                                                        <div class="thumb-edit">
                                                            <input type='file' id="thumbUpload01"
                                                                class="cr-image-upload" multiple name="photos[]"
                                                                accept=".png, .jpg, .jpeg">
                                                            <label><i class="ri-pencil-line"></i></label>
                                                        </div>
                                                        <div class="thumb-preview cr-preview">
                                                            <div class="image-thumb-preview">
                                                                <img class="image-thumb-preview cr-image-preview"
                                                                    src="{{ asset('assets_ad') }}/img/product/preview-2.jpg"
                                                                    alt="edit">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="thumb-upload">
                                                        <div class="thumb-edit">
                                                            <input type='file' id="thumbUpload02"
                                                                class="cr-image-upload" accept=".png, .jpg, .jpeg"
                                                                name="photos[]">
                                                            <label><i class="ri-pencil-line"></i></label>
                                                        </div>
                                                        <div class="thumb-preview cr-preview">
                                                            <div class="image-thumb-preview">
                                                                <img class="image-thumb-preview cr-image-preview"
                                                                    src="{{ asset('assets_ad') }}/img/product/preview-2.jpg"
                                                                    alt="edit">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="thumb-upload">
                                                        <div class="thumb-edit">
                                                            <input type='file' id="thumbUpload03"
                                                                class="cr-image-upload" accept=".png, .jpg, .jpeg"
                                                                name="photos[]">
                                                            <label><i class="ri-pencil-line"></i></label>
                                                        </div>
                                                        <div class="thumb-preview cr-preview">
                                                            <div class="image-thumb-preview">
                                                                <img class="image-thumb-preview cr-image-preview"
                                                                    src="{{ asset('assets_ad') }}/img/product/preview-2.jpg"
                                                                    alt="edit">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="thumb-upload">
                                                        <div class="thumb-edit">
                                                            <input type='file' id="thumbUpload04"
                                                                class="cr-image-upload" accept=".png, .jpg, .jpeg"
                                                                name="photos[]">
                                                            <label><i class="ri-pencil-line"></i></label>
                                                        </div>
                                                        <div class="thumb-preview cr-preview">
                                                            <div class="image-thumb-preview">
                                                                <img class="image-thumb-preview cr-image-preview"
                                                                    src="{{ asset('assets_ad') }}/img/product/preview-2.jpg"
                                                                    alt="edit">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="thumb-upload">
                                                        <div class="thumb-edit">
                                                            <input type='file' id="thumbUpload05"
                                                                class="cr-image-upload" accept=".png, .jpg, .jpeg"
                                                                name="photos[]">
                                                            <label><i class="ri-pencil-line"></i></label>
                                                        </div>
                                                        <div class="thumb-preview cr-preview">
                                                            <div class="image-thumb-preview">
                                                                <img class="image-thumb-preview cr-image-preview"
                                                                    src="{{ asset('assets_ad') }}/img/product/preview-2.jpg"
                                                                    alt="edit">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="thumb-upload">
                                                        <div class="thumb-edit">
                                                            <input type='file' id="thumbUpload06"
                                                                class="cr-image-upload" accept=".png, .jpg, .jpeg"
                                                                name="photos[]">
                                                            <label><i class="ri-pencil-line"></i></label>
                                                        </div>
                                                        <div class="thumb-preview cr-preview">
                                                            <div class="image-thumb-preview">
                                                                <img class="image-thumb-preview cr-image-preview"
                                                                    src="{{ asset('assets_ad') }}/img/product/preview-2.jpg"
                                                                    alt="edit">
                                                            </div>
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
                                                    <label for="inputEmail4" class="form-label">Product name</label>
                                                    <input type="text" class="form-control slug-title" name="name"
                                                        onkeyup="ChangeToSlug()" id="NamePro">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Select Categories</label>
                                                    <select class="form-control form-select " name="category_id">
                                                        @foreach ($cate as $value)
                                                            <optgroup label="{{ $value->name }}">
                                                                @foreach ($value->children as $item)
                                                                    <option value="{{ $item->id }}">
                                                                        {{ $item->name }}
                                                                    </option>
                                                                @endforeach
                                                            </optgroup>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="slug" class="col-12 col-form-label">Slug</label>
                                                <div class="col-12">
                                                    <input id="slug" name="slug"
                                                        class="form-control here set-slug" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label">Sort Description</label>
                                                <textarea class="form-control" name="sortdescription" rows="2"></textarea>
                                            </div>

                                            {{-- <div class="col-md-4 mb-25">
                                                    <label class="form-label color-label">Colors</label>
                                                    <input type="color" class="form-control form-control-color"
                                                        id="exampleColorInput1" value="#ff6191"
                                                        title="Choose your color">
                                                    <input type="color" class="form-control form-control-color"
                                                        id="exampleColorInput2" value="#33317d"
                                                        title="Choose your color">
                                                    <input type="color" class="form-control form-control-color"
                                                        id="exampleColorInput3" value="#56d4b7"
                                                        title="Choose your color">
                                                    <input type="color" class="form-control form-control-color"
                                                        id="exampleColorInput4" value="#009688"
                                                        title="Choose your color">
                                                </div> --}}
                                            <div id="variants" class=" row g-3">
                                                <div class="col-md-12 mb-25">
                                                    <label class="form-label">Size</label>
                                                    <div class="form-checkbox-box">
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" name="variants[0][size]"
                                                                value="250g">
                                                            <label>250g</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" name="variants[0][size]"
                                                                value="500g">
                                                            <label>500g</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" name="variants[0][size]"
                                                                value="1kg">
                                                            <label>1kg</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" name="variants[0][size]"
                                                                value="2kg">
                                                            <label>2kg</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" name="variants[0][size]"
                                                                value="3kg">
                                                            <label>3kg</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" name="variants[0][size]"
                                                                value="4kg">
                                                            <label>4kg</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" name="variants[0][size]"
                                                                value="5kg">
                                                            <label>5kg</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label class="form-label">Price <span>( In VND
                                                            )</span></label>
                                                    <input type="number" class="form-control" name="variants[0][price]"
                                                        id="price1">
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label">Sale Price <span>( In VND
                                                            )</span></label>
                                                    <input type="number" class="form-control"
                                                        name="variants[0][sale_price]" id="sale_price1">
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label">Quantity</label>
                                                    <input type="number" class="form-control" id="quantity1"
                                                        name="variants[0][quantity]" id="price1">
                                                </div>
                                            </div>
                                            <div class="col-md-12 pt-4">
                                                <button type="button" class="btn cr-btn-primary"
                                                    onclick="addVariant()">Add
                                                    Variant</button>
                                            </div>
                                            <div class="col-md-12 pb-4">
                                                <label class="form-label">Ful Detail</label>
                                                <textarea class="form-control" id="editor1" name="description" rows="4"></textarea>
                                            </div>
                                            {{-- <div class="col-md-12">
                                                <label class="form-label">Product Tags <span>( Type and
                                                        make comma to separate tags )</span></label>
                                                <input type="text" class="form-control" id="group_tag"
                                                    name="group_tag" value="" placeholder=""
                                                    data-role="tagsinput">
                                            </div> --}}
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

