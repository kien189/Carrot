@extends('Fe.layout.master')
@section('main_fe')
    <section class="section-wishlist padding-tb-100">
        <div class="container">
            <div class="row d-none">
                <div class="col-lg-12">
                    <div class="mb-30" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
                        <div class="cr-banner">
                            <h2>Wishlist</h2>
                        </div>
                        <div class="cr-banner-sub-title">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore lacus vel facilisis. </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-minus-24" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
                @foreach ($favorite as $value)
                    <div class="col-lg-3 col-6 cr-product-box mb-24">
                        <div class="cr-product-card">
                            <div class="cr-product-image">
                                <div class="cr-image-inner zoom-image-hover">
                                    <img src="{{ asset('storage/images/' . $value->products->image) }}" alt="product-1">
                                </div>
                                <div class="cr-side-view">
                                    <form action="{{ route('deleteWishList', $value->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-black">Xóa</button>
                                    </form>


                                    <a href="javascript:void(0)" class="wishlist">
                                        <i class="ri-close-line"></i>
                                    </a>
                                    <a class="model-oraganic-product" data-bs-toggle="modal"
                                        href="#quickview{{ $value->products->id }}" role="button">
                                        <i class="ri-eye-line"></i>
                                    </a>
                                </div>
                                <a class="cr-shopping-bag" href="javascript:void(0)">
                                    <i class="ri-shopping-bag-line"></i>
                                </a>
                            </div>
                            <div class="cr-product-details">
                                <div class="cr-brand">
                                    <a href="shop-left-sidebar.html">{{ $value->products->category->parent->name }}</a>
                                    <div class="cr-star">
                                        @php
                                            $rating = $value->products->averageRating();
                                            $fullStars = floor($rating);
                                            $halfStar = ceil($rating - $fullStars);
                                            $emptyStars = 5 - $fullStars - $halfStar;
                                        @endphp
                                        @for ($i = 0; $i < $fullStars; $i++)
                                            <i class="ri-star-fill" style="color:#f5885f"></i>
                                        @endfor
                                        @if ($halfStar)
                                            <i class="ri-star-half-line"></i>
                                        @endif
                                        @for ($i = 0; $i < $emptyStars; $i++)
                                            <i class="ri-star-line"></i>
                                        @endfor
                                        <p>({{ $rating }})</p>
                                    </div>
                                </div>
                                <a href="product-left-sidebar.html" class="title">{{ $value->products->name }}</a>
                                <p class="cr-price"><span
                                        class="new-price">{{ number_format($value->products->variants->first()->price) }}đ</span>
                                    <span
                                        class="old-price">{{ number_format($value->products->variants->first()->sale_price) }}đ</span>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
@endsection
{{-- @section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const wishlist = document.querySelector('.wishlist');
           wishlist.addEventListener('click' ,function(){
            axios.post('{{ route('deleteWishList') }}')
           })
        });
    </script>
@endsection --}}
