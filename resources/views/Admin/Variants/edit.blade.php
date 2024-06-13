@extends('Admin.master')
@section('main_admin')
    <base href="/">
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
                                    <img src="{{ asset('assets_ad') }}/img/user/9.jpg" alt="user">
                                    <span class="label online"></span>
                                </div>
                                <div class="detail">
                                    <a href="chatapp.html" class="name">Boris Whisli</a>
                                    <p class="time">5:30AM, Today</p>
                                    <p class="message">Hello, I am sending some file. Please use this in landing page. And
                                        make sure this all files are comppress.</p>
                                    <span class="download-files">
                                        <span class="download">
                                            <img src="{{ asset('assets_ad') }}/img/other/1.jpg" alt="image">
                                            <a href="javascript:void(0)"><i class="ri-download-2-line"></i></a>
                                        </span>
                                        <span class="download">
                                            <img src="{{ asset('assets_ad') }}/img/other/2.jpg" alt="image">
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
                                    <img src="{{ asset('assets_ad') }}/img/user/8.jpg" alt="user">
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
                                    <img src="{{ asset('assets_ad') }}/img/user/7.jpg" alt="user">
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
                                    <img src="{{ asset('assets_ad') }}/img/user/6.jpg" alt="user">
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
                                    <img src="{{ asset('assets_ad') }}/img/user/5.jpg" alt="user">
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
                                        <img src="{{ asset('assets_ad') }}/img/other/1.jpg" alt="image">
                                        <a href="javascript:void(0)"><i class="ri-download-2-line"></i></a>
                                    </span>
                                    <span class="download">
                                        <img src="{{ asset('assets_ad') }}/img/other/2.jpg" alt="image">
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
                                        <img src="{{ asset('assets_ad') }}/img/other/3.jpg" alt="image">
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
                    <h5>Cập nhật biến thể </h5>
                    <ul>
                        <li><a href="{{ route("admin.index") }}">Carrot</a></li>
                        <li><a href="{{ route('variants.index') }}">Biến thế</a></li>
                        <li>Cập nhật biến thể </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="cr-card card-default">
                        <div class="cr-card-content">
                            <form action="{{ route('variants.update',$editVariant) }}" method="POST" enctype="multipart/form-data">
                                @method("PUT")
                                @csrf
                                <div class="row cr-product-uploads">
                                    <input type="hidden" name="id" value="{{ $editVariant->id }}">
                                    <div class="col-lg-8">
                                        </div>
                                            <div id="variants" class=" row g-3">
                                                <div class="col-md-12 mb-25">
                                                    <label class="form-label">Size</label>
                                                    <div class="form-checkbox-box">
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" name="size" value="S" {{ $editVariant->size == 'S' ? 'checked' : '' }}
                                                                value="S">
                                                            <label>S</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" name="size" value="M" {{ $editVariant->size == 'M' ? 'checked' : '' }}
                                                                value="M">
                                                            <label>M</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" name="size" value="L" {{ $editVariant->size == 'L' ? 'checked' : '' }}
                                                                value="L">
                                                            <label>L</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" name="size" value="XL" {{ $editVariant->size == 'XL' ? 'checked' : '' }}
                                                                value="XL">
                                                            <label>XL</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" name="size" value="XXL" {{ $editVariant->size == 'XXL' ? 'checked' : '' }}
                                                                value="XXL">
                                                            <label>XXL</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label class="form-label">Price <span>( In VND
                                                            )</span></label>
                                                    <input type="number" value="{{$editVariant->price}}" class="form-control" name="price"
                                                        id="price1">
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label">Sale Price <span>( In VND
                                                            )</span></label>
                                                    <input type="number" class="form-control" value="{{$editVariant->sale_price}}"
                                                        name="sale_price" id="sale_price1">
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label">Quantity</label>
                                                    <input type="number" class="form-control" id="quantity1" value="{{number_format($editVariant->quantity)}}"
                                                        name="quantity" id="price1">
                                                </div>
                                            </div>
                                            {{-- <div class="col-md-12">
                                                <label class="form-label">Product Tags <span>( Type and
                                                        make comma to separate tags )</span></label>
                                                <input type="text" class="form-control" id="group_tag"
                                                    name="group_tag" value="" placeholder=""
                                                    data-role="tagsinput">
                                            </div> --}}
                                            <div class="col-md-12 pt-4">
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
@section('script')
    <script>
        let variantIndex = 1;

        function addVariant() {
            const variantsDiv = document.getElementById('variants');
            const variantDiv = document.createElement('div');
            variantDiv.innerHTML = `
                                          <div id="variants" class=" row g-3">
                                            <div class="col-md-12 mb-25">
                                                <label class="form-label">Size</label>
                                                <div class="form-checkbox-box">
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" name="variants[${variantIndex}][size]" value="S">
                                                        <label>S</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" name="variants[${variantIndex}][size]" value="M">
                                                        <label>M</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" name="variants[${variantIndex}][size]" value="L">
                                                        <label>L</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" name="variants[${variantIndex}][size]" value="XL">
                                                        <label>XL</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" name="variants[${variantIndex}][size]" value="XXL">
                                                        <label>XXL</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <label class="form-label">Price <span>( In USD
                                                        )</span></label>
                                                <input type="number" class="form-control" name="variants[${variantIndex}][price]"
                                                    id="price1">
                                            </div>
                                             <div class="col-md-4">
                                                    <label class="form-label">Price <span>( In VND
                                                            )</span></label>
                                                    <input type="number" class="form-control" name="variants[${variantIndex}][sale_price]"
                                                        id="price1">
                                                </div>
                                            <div class="col-md-4">
                                                <label class="form-label">Quantity</label>
                                                <input type="number" class="form-control" id="quantity1"
                                                    name="variants[${variantIndex}][quantity]" id="price1">
                                            </div>
                                        </div>
                                    `;
            variantsDiv.appendChild(variantDiv);
            variantIndex++;
        }
    </script>
    <script>
        function ChangeToSlug() {
            var title, slug;

            //Lấy text từ thẻ input title
            title = document.getElementById("NamePro").value;

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
