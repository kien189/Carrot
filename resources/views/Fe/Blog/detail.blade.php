@extends('Fe.layout.master')
@section('main_fe')
    <!-- Breadcrumb -->
    <section class="section-breadcrumb">
        <div class="cr-breadcrumb-image">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="cr-breadcrumb-title">
                            <h2>Blog Details</h2>
                            <span> <a href="index.html">Home</a> - Blog Details</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Blog-details -->
    <section class="blog-details padding-tb-100">
        <div class="container">
            <div class="row" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
                <div class="col-lg-12">
                    <div class="cr-blog-details">
                        <div class="cr-blog-details-image">
                            <img src="{{ asset('storage/images/'.$blog->image) }}" alt="blog-1">
                        </div>
                        <div class="cr-blog-details-content">
                            <div class="cr-admin-date">
                                <span><code>{{$blog->user->name  }}</code> / 07 Comment / Date - 09 ,09 ,2024</span>
                            </div>
                            <div class="cr-banner">
                                <h2>{{ $blog->title }}</h2>
                            </div>
                            <p class="mb-15">{!! $blog->description !!}.</p>

                        </div>
                        <div class="row mt-30">
                            @foreach ($blogs as $value)
                            <div class="col-6">
                                <div class="cr-blog-inner-cols">
                                    <div class="blog-img">
                                        <img src="{{ asset('storage/images/'.$value->image) }}" alt="blog-2">
                                    </div>
                                    <div class="cr-blog-inner-content">
                                        <a href="{{ route('blogDetail',$value->slug) }}"><p>{{ $value->title }}</p></a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        {{-- <div class="cr-blog-details-message">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat repellat earum
                                architecto odit soluta quas odio distinctio quae numquam? Quaerat nulla blanditiis
                                possimus quae. Iusto doloribus, est aliquam delectus pariatur voluptatem cum iste
                                exercitationem rem.</p>
                            <h5 class="title"> John martin</h5>
                        </div>
                        <div class="cr-blog-details-paragrap">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores officia magni
                                explicabo fuga molestiae architecto ipsa excepturi laudantium molestias, assumenda vel
                                fugiat hic exercitationem. Necessitatibus itaque et id! Ratione accusantium voluptatum
                                optio rerum facilis expedita.</p>
                        </div>
                        <div class="cr-blog-details-tags">
                            <div class="cr-details-tags">
                                <ul class="cr-tags blog">
                                    <li><a href="javascript:void(0)">Cabbage</a></li>
                                    <li><a href="javascript:void(0)">Appetizer</a></li>
                                    <li><a href="javascript:void(0)">Meat Food</a></li>
                                </ul>
                                <div class="cr-logo">
                                    <a href="javascript:void(0)"><i class="ri-facebook-line"></i></a>
                                    <a href="javascript:void(0)"><i class="ri-twitter-x-line"></i></a>
                                    <a href="javascript:void(0)"><i class="ri-instagram-line"></i></a>
                                    <a href="javascript:void(0)"><i class="ri-linkedin-line"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <nav aria-label="..." class="cr-pagination">
                    <ul class="pagination">
                        <li class="page-item disabled">
                            <span class="page-link">Previous</span>
                        </li>
                        <li class="page-item active" aria-current="page">
                            <span class="page-link">1</span>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav> --}}
            </div>
        </div>
    </section>
@endsection
