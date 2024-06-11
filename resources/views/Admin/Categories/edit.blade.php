@extends('Admin.master')
@section('main_admin')
    <base href="/">
    <!-- main content -->
    <div class="cr-main-content">
        <div class="container-fluid">
            <!-- Page title & breadcrumb -->
            <div class="cr-page-title cr-page-title-2">
                <div class="cr-breadcrumb">
                    <h5>Category</h5>
                    <ul>
                        <li><a href="index.html">Carrot</a></li>
                        <li>Category</li>
                    </ul>
                </div>
            </div>
            <div class="row cr-category">
                <div class="col-xl-4 col-lg-12">
                    <div class="team-sticky-bar">
                        <div class="col-md-12">
                            <div class="cr-cat-list cr-card card-default mb-24px">
                                <div class="cr-card-content">
                                    <div class="cr-cat-form">
                                        <h3>Thêm mới danh mục </h3>

                                        <form action="{{ route('category.update', $editCate) }}" method="POST">
                                            @method('PUT')
                                            @csrf
                                            <input type="hidden" value="{{ $editCate->id }}">
                                            <div class="form-group">
                                                <label>Tên danh mục</label>
                                                <div class="col-12">
                                                    <input name="name" class="form-control here slug-title"
                                                        type="text" id="CateName" value="{{ $editCate->name }}"
                                                        onkeyup="ChangeToSlug()">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label>Đường dẫn</label>
                                                <div class="col-12">
                                                    <input id="slug" name="slug" class="form-control here set-slug"
                                                        type="text" id="slug" value="{{ $editCate->slug }}">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label>Mô tả ngắn</label>
                                                <div class="col-12">
                                                    <textarea id="sortdescription" name="sortdescription" cols="40" rows="2" class="form-control">{{ $editCate->sortdescription }}</textarea>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label>Mô tả</label>
                                                <div class="col-12">
                                                    <textarea id="fulldescription" name="description" cols="40" rows="4" class="form-control">{{ $editCate->description }}</textarea>
                                                </div>
                                            </div>

                                            {{-- <div class="form-group row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="">Danh mục cha</label>
                                                        <select class="form-control" name="parent_id" id="">
                                                            <option value="">--Chọn danh mục cha--</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- <label class="custom-control custom-checkbox me-4 p-2">
                                                <div class="d-flex align-item-center">
                                                    <input type="radio" name="status" id="" value="0"
                                                        class="custom-control-input me-2"
                                                        {{ $editCata->status == 0 ? 'checked' : '' }}>
                                                    <span class="custom-control-indicator">Hiện</span>
                                                </div>
                                            </label>
                                            <label class="custom-control custom-checkbox p-2">
                                                <div class="d-flex align-item-center">
                                                    <input type="radio" name="status" id="" value="1"
                                                        class="custom-control-input me-2"
                                                        {{ $editCata->status == 1 ? 'checked' : '' }}>
                                                    <span class="custom-control-indicator">Ẩn</span>
                                                </div>
                                            </label> --}}

                                            <div class="row">
                                                <div class="col-12 d-flex">
                                                    <button type="submit" class="cr-btn-primary">Submit</button>
                                                </div>
                                            </div>

                                        </form>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-12">
                    <div class="cr-cat-list cr-card card-default">
                        <div class="cr-card-content ">
                            <div class="table-responsive tbl-800">
                                <table id="cat_data_table" class="table">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Sub Categories</th>
                                            <th>Product</th>
                                            <th>Status</th>
                                            <th>Trending</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($cate as $value)
                                            <tr>
                                                <td>{{ $value->name }}</td>
                                                <td>
                                                    <span class="cr-sub-cat-list">
                                                        <span class="cr-sub-cat-count" title="Total Sub Categories">5</span>
                                                        <span class="cr-sub-cat-tag">T-shirt</span>
                                                        <span class="cr-sub-cat-tag">Shirt</span>
                                                        <span class="cr-sub-cat-tag">Dress</span>
                                                        <span class="cr-sub-cat-tag">Jeans</span>
                                                        <span class="cr-sub-cat-tag">Top</span>
                                                    </span>
                                                </td>
                                                <td>28</td>
                                                <td class="active">ACTIVE</td>
                                                <td><span class="badge badge-success">Top</span></td>
                                                <td>
                                                    <div>
                                                        <button type="button"
                                                            class="btn btn-outline-success dropdown-toggle dropdown-toggle-split"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false" data-display="static">
                                                            <span class=""><i class="fa-solid fa-gear"></i></span>
                                                        </button>

                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item"
                                                                href="{{ route('category.edit', $value->id) }}">Edit</a>
                                                            <form action="{{ route('category.destroy', $value->id) }}"
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
@section('script')
    <script>
        function ChangeToSlug() {
            var title, slug;

            //Lấy text từ thẻ input title
            title = document.getElementById("CateName").value;

            //Đổi chữ hoa thành chữ thường
            slug = title.toLowerCase();

            //Đổi ký tự có dấu thành không dấu
            slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
            slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
            slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
            slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
            slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
            slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
            slug = slug.replace(/đ/gi, 'd');
            //Xóa các ký tự đặt biệt
            slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
            //Đổi khoảng trắng thành ký tự gạch ngang
            slug = slug.replace(/ /gi, "-");
            //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
            //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
            slug = slug.replace(/\-\-\-\-\-/gi, '-');
            slug = slug.replace(/\-\-\-\-/gi, '-');
            slug = slug.replace(/\-\-\-/gi, '-');
            slug = slug.replace(/\-\-/gi, '-');
            //Xóa các ký tự gạch ngang ở đầu và cuối
            slug = '@' + slug + '@';
            slug = slug.replace(/\@\-|\-\@|\@/gi, '');
            //In slug ra textbox có id “slug”
            document.getElementById('slug').value = slug;
        }
    </script>
@endsection
