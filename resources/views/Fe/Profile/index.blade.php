@extends('Fe.layout.master')
@section('main_fe')
    <section class="section-breadcrumb">
        <div class="cr-breadcrumb-image">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="cr-breadcrumb-title">
                            <h2>Register</h2>
                            <span> <a href="index.html">Home</a> - Register</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Profile Section -->
    <section class="section-profile padding-tb-100 container  p5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cr-profile" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
                        <div class="form-logo">
                            <img src="assets/img/logo/logo.png" alt="logo">
                        </div>
                        <form class="cr-content-form">
                            <div class="row">
                                <div class="col-12 col-sm-3">
                                    <div class="avatar-upload">
                                        <div class="avatar-preview cr-preview">
                                            <div id="imagePreview" class="imagePreview cr-div-preview">
                                                <img class="cr-image-preview"
                                                    src="{{ $profile->image ? $profile->image : 'https://ss-images.saostar.vn/wp700/pc/1613810558698/Facebook-Avatar_3.png' }}"
                                                    alt="Preview">

                                            </div>
                                            <div class="avatar-edit">
                                                <input hidden type='file' id="imageUpload" class="cr-image-upload"
                                                    accept=".png, .jpg, .jpeg">
                                                <label for="imageUpload"><i class="ri-pencil-line"></i></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-9 pt-5">
                                    <div class="form-group">
                                        <label>First Name*</label>
                                        <input type="text" placeholder="Enter Your First Name" class="cr-form-control"
                                            value="{{ $profile->name }}">
                                    </div>
                                </div>

                                <script>
                                    document.addEventListener("DOMContentLoaded", function() {
                                        const imageUpload = document.getElementById('imageUpload');
                                        const imagePreview = document.getElementById('imagePreview');
                                        const previewImage = imagePreview.querySelector('.cr-image-preview');

                                        imageUpload.addEventListener('change', function() {
                                            const file = this.files[0];

                                            if (file) {
                                                const reader = new FileReader();

                                                reader.onload = function(e) {
                                                    previewImage.src = e.target.result;
                                                }

                                                reader.readAsDataURL(file);
                                            } else {
                                                previewImage.src =
                                                    'assets/img/product/preview.jpg'; // Nếu không có hình ảnh được chọn, hiển thị hình ảnh mặc định
                                            }
                                        });
                                    });
                                </script>
                                <style>
                                    .avatar-upload {
                                        display: inline-block;
                                        position: relative;
                                    }

                                    .avatar-edit {
                                        position: absolute;
                                        left: 117px;
                                        bottom: 0;

                                    }

                                    .avatar-edit label {
                                        cursor: pointer;
                                        display: block;
                                        width: 30px;
                                        height: 30px;
                                        border-radius: 50%;
                                        background-color: #f8f9fa;
                                        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
                                        text-align: center;
                                        line-height: 30px;
                                        font-size: 14px;
                                    }

                                    .avatar-preview {
                                        width: 150px;
                                        height: 150px;
                                        border-radius: 50%;
                                        overflow: hidden;
                                        border: 2px solid #ccc;
                                    }

                                    .imagePreview {
                                        width: 100%;
                                        height: 100%;
                                        object-fit: cover;
                                    }

                                    .cr-div-preview {
                                        position: relative;
                                    }

                                    .cr-image-preview {
                                        width: 100%;
                                        height: 100%;
                                    }
                                </style>
                                <div class="col-12  col-sm-6">
                                    <div class="form-group">
                                        <label>Email*</label>
                                        <input type="email" placeholder="Enter Your email" class="cr-form-control"
                                            value="{{ $profile->email }}">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Phone Number*</label>
                                        <input type="text" placeholder="Enter Your phone number" class="cr-form-control"
                                            value="{{ $profile->phone }}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Address*</label>
                                        <input type="text" placeholder="Address" class="cr-form-control"
                                            value="{{ $profile->address }}">
                                    </div>
                                </div>

                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Post Code</label>
                                        <input type="email" placeholder="Post Code" class="cr-form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Gender*</label>
                                        <select class="cr-form-control" aria-label="Default select example">
                                            <option value="0" {{ $profile->gender == 0 ? 'selected' : '' }}>Nam
                                            </option>
                                            <option value="1" {{ $profile->gender == 1 ? 'selected' : '' }}>Nữ</option>
                                            <option value="2" {{ $profile->gender == 2 ? 'selected' : '' }}>Khác
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                {{-- <div class="col-12">
                                    <div class="form-group">
                                        <label>Profile Picture</label>
                                        <img src="{{ asset('storage/images/' . $profile->image) }}" alt="Lỗi ">
                                        <input type="file" class="form-control-file">
                                    </div>
                                </div> --}}
                                <div class="cr-profile-buttons">
                                    <button type="button" class="cr-button">Save Profile</button>
                                    <a href="#" class="link" id="changePasswordLink">
                                        Change Password
                                    </a>
                                </div>
                                <!-- Phần đổi mật khẩu -->
                                <div id="changePasswordSection" style="display: none;">
                                    <div class="col-12 col-sm-6 pt-4">
                                        <div class="form-group">
                                            <label>First Name*</label>
                                            <input type="text" placeholder="Enter Your First Name"
                                                class="cr-form-control">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Last Name*</label>
                                            <input type="text" placeholder="Enter Your Last Name"
                                                class="cr-form-control">
                                        </div>
                                    </div>
                                    <div class="cr-profile-buttons">
                                        <button type="button" class="cr-button">Save Profile</button>
                                        <a href="#" class="link" id="changePasswordLink">
                                            Change Password
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var changePasswordLink = document.getElementById('changePasswordLink');
            var changePasswordSection = document.getElementById('changePasswordSection');

            changePasswordLink.addEventListener('click', function(e) {
                e.preventDefault();
                if (changePasswordSection.style.display === 'none') {
                    changePasswordSection.style.display = 'block';
                } else {
                    changePasswordSection.style.display = 'none';
                }
            });
        });
    </script>
@endsection
