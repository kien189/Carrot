@extends('Admin.master')
@section('main_admin')
    <div class="cr-notify-bar-overlay"></div>
    <div class="cr-notify-bar">
        <div class="cr-bar-title">
            <h6>Notifications<span class="label">12</span></h6>
            <a href="javascript:void(0)" class="close-notify"><i class="ri-close-line"></i></a>
        </div>
        <div class="cr-bar-content">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="alert-tab" data-bs-toggle="tab" data-bs-target="#alert"
                        type="button" role="tab" aria-controls="alert" aria-selected="true">Alert</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="messages-tab" data-bs-toggle="tab" data-bs-target="#messages"
                        type="button" role="tab" aria-controls="messages" aria-selected="false">Messages</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="log-tab" data-bs-toggle="tab" data-bs-target="#log" type="button"
                        role="tab" aria-controls="log" aria-selected="false">Log</button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="alert" role="tabpanel" aria-labelledby="alert-tab">
                    <div class="cr-alert-list">
                        <ul>
                            <li>
                                <div class="icon cr-alert">
                                    <i class="ri-alarm-warning-line"></i>
                                </div>
                                <div class="detail">
                                    <div class="title">Your final report is overdue</div>
                                    <p class="time">Just now</p>
                                    <p class="message">Please submit your quarterly report before - June 15.</p>
                                </div>
                            </li>
                            <li>
                                <div class="icon cr-warn">
                                    <i class="ri-error-warning-line"></i>
                                </div>
                                <div class="detail">
                                    <div class="title">Your product campaign is stop!</div>
                                    <p class="time">5:45AM - 25/05/2023</p>
                                    <p class="message">Please submit your quarterly report before Jun 15.</p>
                                </div>
                            </li>
                            <li>
                                <div class="icon cr-success">
                                    <i class="ri-check-double-line"></i>
                                </div>
                                <div class="detail">
                                    <div class="title">Your payment is successfully processed</div>
                                    <p class="time">9:20PM - 19/06/2023</p>
                                    <p class="message">Check your account wallet. if there is any issue, create support
                                        ticket.</p>
                                </div>
                            </li>
                            <li>
                                <div class="icon cr-warn">
                                    <i class="ri-error-warning-line"></i>
                                </div>
                                <div class="detail">
                                    <div class="title">Budget threshold exceeded!</div>
                                    <p class="time">4:15AM - 01/04/2023</p>
                                    <p class="message">Budget threshold was exceeded for project "Carrot" B612 elements.</p>
                                </div>
                            </li>
                            <li>
                                <div class="icon cr-warn">
                                    <i class="ri-close-line"></i>
                                </div>
                                <div class="detail">
                                    <div class="title">Project submission was decline!</div>
                                    <p class="time">4:15AM - 01/04/2023</p>
                                    <p class="message">Your project "B126" is declined by Theresa Mayeras.</p>
                                </div>
                            </li>
                            <li>
                                <div class="icon cr-success">
                                    <i class="ri-check-double-line"></i>
                                </div>
                                <div class="detail">
                                    <div class="title">Your payment is successfully processed</div>
                                    <p class="time">9:20PM - 19/06/2023</p>
                                    <p class="message">Check your account wallet. if there is any issue, create support
                                        ticket.</p>
                                </div>
                            </li>
                            <li class="check"><a class="cr-primary-btn" href="chatapp.html">View all</a></li>
                        </ul>
                    </div>
                </div>
                <div class="tab-pane fade" id="messages" role="tabpanel" aria-labelledby="messages-tab">
                    <div class="cr-message-list">
                        <ul>
                            <li>
                                <a href="chatapp.html" class="reply">Reply</a>
                                <div class="user">
                                    <img src="assets/img/user/9.jpg" alt="user">
                                    <span class="label online"></span>
                                </div>
                                <div class="detail">
                                    <a href="chatapp.html" class="name">Boris Whisli</a>
                                    <p class="time">5:30AM, Today</p>
                                    <p class="message">Hello, I am sending some file. Please use this in landing page. And
                                        make sure this all files are comppress.</p>
                                    <span class="download-files">
                                        <span class="download">
                                            <img src="assets/img/other/1.jpg" alt="image">
                                            <a href="javascript:void(0)"><i class="ri-download-2-line"></i></a>
                                        </span>
                                        <span class="download">
                                            <img src="assets/img/other/2.jpg" alt="image">
                                            <a href="javascript:void(0)"><i class="ri-download-2-line"></i></a>
                                        </span>
                                        <span class="download">
                                            <span class="file">
                                                <i class="ri-file-ppt-line"></i>
                                            </span>
                                            <a href="javascript:void(0)"><i class="ri-download-2-line"></i></a>
                                        </span>
                                    </span>
                                </div>
                            </li>
                            <li>
                                <a href="chatapp.html" class="reply">Reply</a>
                                <div class="user">
                                    <img src="assets/img/user/8.jpg" alt="user">
                                    <span class="label offline"></span>
                                </div>
                                <div class="detail">
                                    <a href="chatapp.html" class="name">Frank N. Stein</a>
                                    <p class="time">8:30PM, 05/12/2023</p>
                                    <p class="message">Please take a look on landing page. There is some bus to open popup
                                        model. and save form data.</p>
                                </div>
                            </li>
                            <li>
                                <a href="chatapp.html" class="reply">Reply</a>
                                <div class="user">
                                    <img src="assets/img/user/7.jpg" alt="user">
                                    <span class="label busy"></span>
                                </div>
                                <div class="detail">
                                    <a href="chatapp.html" class="name">Frank N. Stein</a>
                                    <p class="time">8:30PM, 05/12/2023</p>
                                    <p class="message">Please take a look on landing page. There is some bus to open popup
                                        model. and save form data.</p>
                                    <span class="download-files">
                                        <span class="download">
                                            <span class="file">
                                                <i class="ri-file-zip-line"></i>
                                            </span>
                                            <a href="javascript:void(0)"><i class="ri-download-2-line"></i></a>
                                        </span>
                                        <span class="download">
                                            <span class="file">
                                                <i class="ri-file-text-line"></i>
                                            </span>
                                            <a href="javascript:void(0)"><i class="ri-download-2-line"></i></a>
                                        </span>
                                        <span class="download">
                                            <span class="file">
                                                <i class="ri-file-ppt-line"></i>
                                            </span>
                                            <a href="javascript:void(0)"><i class="ri-download-2-line"></i></a>
                                        </span>
                                    </span>
                                </div>
                            </li>
                            <li>
                                <a href="chatapp.html" class="reply">Reply</a>
                                <div class="user">
                                    <img src="assets/img/user/6.jpg" alt="user">
                                    <span class="label busy"></span>
                                </div>
                                <div class="detail">
                                    <a href="chatapp.html" class="name">Paige Turner</a>
                                    <p class="time">4:30PM, 12/12/2023</p>
                                    <p class="message">Landing page issues are done. and now i am working on admin user
                                        module.</p>
                                </div>
                            </li>
                            <li>
                                <a href="chatapp.html" class="reply">Reply</a>
                                <div class="user">
                                    <img src="assets/img/user/5.jpg" alt="user">
                                    <span class="label busy"></span>
                                </div>
                                <div class="detail">
                                    <a href="chatapp.html" class="name">Allie Grater</a>
                                    <p class="time">8:30PM, 05/12/2023</p>
                                    <p class="message">Take marketing module task.</p>
                                </div>
                            </li>
                            <li class="check"><a class="cr-primary-btn" href="chatapp.html">View all</a></li>
                        </ul>
                    </div>
                </div>
                <div class="tab-pane fade" id="log" role="tabpanel" aria-labelledby="log-tab">
                    <div class="cr-activity-list activity-list">
                        <ul>
                            <li>
                                <span class="date-time">8 Thu<span class="time">11:30 AM - 05:10 PM
                                    </span></span>
                                <p class="title">Project Submitted from Smith</p>
                                <p class="detail">Lorem Ipsum is simply dummy text of the printing and
                                    lorem is typesetting industry.</p>
                                <span class="download-files">
                                    <span class="download">
                                        <img src="assets/img/other/1.jpg" alt="image">
                                        <a href="javascript:void(0)"><i class="ri-download-2-line"></i></a>
                                    </span>
                                    <span class="download">
                                        <img src="assets/img/other/2.jpg" alt="image">
                                        <a href="javascript:void(0)"><i class="ri-download-2-line"></i></a>
                                    </span>
                                    <span class="download">
                                        <span class="file">
                                            <i class="ri-file-ppt-line"></i>
                                        </span>
                                        <a href="javascript:void(0)"><i class="ri-download-2-line"></i></a>
                                    </span>
                                </span>
                            </li>
                            <li>
                                <span class="date-time warn">7 Wed<span class="time">1:30 PM - 02:30 PM
                                    </span></span>
                                <p class="title">Morgus pvt - project due</p>
                                <p class="detail">Project modul delay for some bugs.</p>
                                <span class="download-files">
                                    <span class="download">
                                        <span class="file">
                                            <i class="ri-file-zip-line"></i>
                                        </span>
                                        <a href="javascript:void(0)"><i class="ri-download-2-line"></i></a>
                                    </span>
                                    <span class="download">
                                        <span class="file">
                                            <i class="ri-file-text-line"></i>
                                        </span>
                                        <a href="javascript:void(0)"><i class="ri-download-2-line"></i></a>
                                    </span>
                                    <span class="download">
                                        <img src="assets/img/other/3.jpg" alt="image">
                                        <a href="javascript:void(0)"><i class="ri-download-2-line"></i></a>
                                    </span>
                                </span>
                            </li>
                            <li>
                                <span class="date-time">6 Tue<span class="time">9:30 AM - 11:00 AM
                                    </span></span>
                                <p class="title">Interview for management dept.</p>
                                <p class="detail">There are many variations of passages of Lorem Ipsum
                                    available, but the majority have suffered alteration in some form,
                                    by injected humour.</p>
                                <span class="download-files">
                                    <span class="download">
                                        <span class="file">
                                            <i class="ri-file-zip-line"></i>
                                        </span>
                                        <a href="javascript:void(0)"><i class="ri-download-2-line"></i></a>
                                    </span>
                                    <span class="download">
                                        <span class="file">
                                            <i class="ri-file-text-line"></i>
                                        </span>
                                        <a href="javascript:void(0)"><i class="ri-download-2-line"></i></a>
                                    </span>
                                    <span class="download">
                                        <span class="file">
                                            <i class="ri-file-ppt-line"></i>
                                        </span>
                                        <a href="javascript:void(0)"><i class="ri-download-2-line"></i></a>
                                    </span>
                                </span>
                            </li>
                            <li>
                                <span class="date-time">5 Mon<span class="time">3:30 AM - 4:00 PM
                                    </span></span>
                                <p class="title">Meeting with mr. Ken doe</p>
                                <p class="detail">The majority have suffered alteration in some form,
                                    by injected humour.</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- main content -->
    <div class="cr-main-content">
        <div class="container-fluid">
            <!-- Page title & breadcrumb -->
            <div class="cr-page-title cr-page-title-2">
                <div class="cr-breadcrumb">
                    <h5>Danh mục con</h5>
                    <ul>
                        <li><a href="{{ route('admin.index') }}">Carrot</a></li>
                        <li>Danh mục con</li>
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
                                        <h3>Thêm danh mục con</h3>
                                        <form action="{{ route('subCategory.update',$editSubCate->id) }}" method="POST">
                                            @method('PUT')
                                            @csrf
                                            <input type="hidden" value="{{ $editSubCate->id }}">
                                            <div class="form-group">
                                                <label>Tên danh mục </label>
                                                <div class="col-12">
                                                    <input id="CateName" name="name"
                                                        class="form-control here slug-title" type="text" value="{{ $editSubCate->name }}"
                                                        onkeyup="ChangeToSlug()">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label>Đường dẫn</label>
                                                <div class="col-12">
                                                    <input id="slug" name="slug" value="{{ $editSubCate->slug }}"
                                                        class="form-control here set-slug" type="text">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label>Mô tả ngắn</label>
                                                <div class="col-12">
                                                    <textarea id="sortdescription" name="sortdescription" cols="40" rows="2" class="form-control">{{ $editSubCate->sortdescription }}</textarea>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label>Mô tả</label>
                                                <div class="col-12">
                                                    <textarea id="fulldescription" name="description" cols="40" rows="4" class="form-control">{{ $editSubCate->description }}</textarea>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="">Danh mục cha</label>
                                                        <select class="form-control" name="parent_id" id="parent_id">
                                                            <option value="">--Chọn danh mục cha--</option>
                                                            @foreach ($Cates as $value)
                                                                <option value="{{ $value->id }}"{{ $editSubCate->parent_id == $value->id ? 'selected' : '' }}>{{ $value->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- <label class="custom-control custom-checkbox me-4 p-2 ">
                                                <div class="d-flex align-item-center">
                                                    <input type="radio" id="status" name="status" value="0"
                                                        class="custom-control-input me-2">
                                                    <span class="custom-control-indicator">Hiện </span>
                                                </div>
                                            </label>
                                            <label class="custom-control custom-checkbox p-2">
                                                <div class="d-flex align-item-center">
                                                    <input type="radio" name="status" id="status" value="1"
                                                        class="custom-control-input me-2">
                                                    <span class="custom-control-indicator">Ẩn</span>
                                                </div>

                                            </label> --}}
                                            <div class="row">
                                                <div class="col-12 d-flex">
                                                    <button type="submit" id="btnAddSubCategories"
                                                        class="cr-btn-primary">Submit</button>
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
                                            <th>Main Categories</th>
                                            <th>Product</th>
                                            <th>Status</th>
                                            <th>Trending</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($subCate as $value)
                                            <tr>
                                                <td>{{ $value->name }}</td>
                                                <td>
                                                    <span class="cr-sub-cat-list">
                                                        @if ($value->parent)
                                                            <span class="cr-sub-cat-tag">{{ $value->parent->name }}</span>
                                                        @else
                                                            <span class="cr-sub-cat-tag">No Parent</span>
                                                        @endif
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
                                                                href="{{ route('subCategory.edit', $value->id) }}">Edit</a>
                                                            <a class="dropdown-item"
                                                                href="{{ route('subCategory.destroy', $value->id) }}">Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                            {{-- <div id="pagination" class="d-flex justify-content-between">

                                <div class="">
                                    <!-- Hiển thị thông tin số lượng mục -->
                                    <p class="sm ">Hiển thị {{ $subCate->firstItem() }} đến {{ $subCate->lastItem() }}
                                        của {{ $subCate->total() }}
                                        mục</p>
                                </div>
                                <nav aria-label="Page navigation" class="float-end">
                                    <ul class="pagination">
                                        <li class="page-item {{ $subCate->currentPage() == 1 ? 'disabled' : '' }}">
                                            <a class="page-link" href="{{ $subCate->previousPageUrl() }}" tabindex="-1"
                                                aria-disabled="true">Previous</a>
                                        </li>
                                        @for ($i = 1; $i <= $subCate->lastPage(); $i++)
                                            <li class="page-item {{ $subCate->currentPage() == $i ? 'active' : '' }}">
                                                <a class="page-link"
                                                    href="{{ $subCate->url($i) }}">{{ $i }}</a>
                                            </li>
                                        @endfor
                                        <li
                                            class="page-item {{ $subCate->currentPage() == $subCate->lastPage() ? 'disabled' : '' }}">
                                            <a class="page-link" href="{{ $subCate->nextPageUrl() }}">Next</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div> --}}
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
            slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '-');
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
