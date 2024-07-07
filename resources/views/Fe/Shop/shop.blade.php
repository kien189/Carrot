@extends('Fe.layout.master')
@section('main_fe')
    <!-- Breadcrumb -->
    <section class="section-breadcrumb">
        <div class="cr-breadcrumb-image">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="cr-breadcrumb-title">
                            <h2>Shop</h2>
                            <span> <a href="index.html">Home</a> - Shop</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Shop -->
    <section class="section-shop padding-tb-100">
        <div class="container">
            <div class="row d-none">
                <div class="col-lg-12">
                    <div class="mb-30" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
                        <div class="cr-banner">
                            <h2>Categories</h2>
                        </div>
                        <div class="cr-banner-sub-title">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore lacus vel facilisis. </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-12 md-30" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
                    <div class="cr-shop-sideview">

                        <div class="cr-shop-categories">
                            <h4 class="cr-shop-sub-title">Category</h4>
                            <div class="cr-checkbox">
                                @foreach ($categories as $item)
                                    <div class="checkbox-group" data-id="{{ $item->id }}">
                                        <input type="checkbox" id="category_{{ $item->id }}" class="category"
                                            name="categories[]" value="{{ $item->id }}">
                                        <label for="category_{{ $item->id }}">{{ $item->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="cr-shop-price">
                            <h4 class="cr-shop-sub-title">Price</h4>
                            <div class="price-range-slider">
                                <div id="slider-ranges" class="range-bar"></div>
                                <p class="range-value">
                                    <label>Price :</label>
                                    <input type="text" id="amounts" placeholder="'" readonly>
                                </p>
                                <input type="hidden" name="min_price" id="min_price">
                                <input type="hidden" name="max_price" id="max_price">
                                <button type="submit" id="filter" class="cr-button">Filter</button>
                            </div>
                        </div>

                        <div class="cr-shop-color">
                            <h4 class="cr-shop-sub-title">Colors</h4>
                            <div class="cr-checkbox">
                                <div class="checkbox-group">
                                    <input type="checkbox" id="blue">
                                    <label for="blue">Blue</label>
                                    <span class="blue"></span>
                                </div>
                                <div class="checkbox-group">
                                    <input type="checkbox" id="yellow">
                                    <label for="yellow">Yellow</label>
                                    <span class="yellow"></span>
                                </div>
                                <div class="checkbox-group">
                                    <input type="checkbox" id="red">
                                    <label for="red">Red</label>
                                    <span class="red"></span>
                                </div>
                            </div>
                        </div>
                        <div class="cr-shop-weight">
                            <h4 class="cr-shop-sub-title">Weight</h4>
                            <div class="cr-checkbox">
                                <div class="checkbox-group">
                                    <input type="checkbox" id="2kg">
                                    <label for="2kg">2kg Pack</label>
                                </div>
                                <div class="checkbox-group">
                                    <input type="checkbox" id="20kg">
                                    <label for="20kg">20kg Pack</label>
                                </div>
                                <div class="checkbox-group">
                                    <input type="checkbox" id="30kg">
                                    <label for="30kg">30kg pack</label>
                                </div>
                            </div>
                        </div>
                        <div class="cr-shop-tags">
                            <h4 class="cr-shop-sub-title">Tages</h4>
                            <div class="cr-shop-tags-inner">
                                <ul class="cr-tags">
                                    <li><a href="javascript:void(0)">Vegetables</a></li>
                                    <li><a href="javascript:void(0)">juice</a></li>
                                    <li><a href="javascript:void(0)">Food</a></li>
                                    <li><a href="javascript:void(0)">Dry Fruits</a></li>
                                    <li><a href="javascript:void(0)">Vegetables</a></li>
                                    <li><a href="javascript:void(0)">juice</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-12 md-30" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="600">
                    <div class="row">
                        <div class="col-12">
                            <div class="cr-shop-bredekamp">
                                <div class="cr-toggle">
                                    <a href="javascript:void(0)" class="gridCol active-grid">
                                        <i class="ri-grid-line"></i>
                                    </a>
                                    <a href="javascript:void(0)" class="gridRow">
                                        <i class="ri-list-check-2"></i>
                                    </a>
                                </div>
                                <div class="center-content">
                                    <span>We found 29 items for you!</span>
                                </div>
                                <div class="cr-select">
                                    <label for="sortBy">Sort By :</label>
                                    <select class="form-select" id="sortBy" aria-label="Default select example">
                                        <option value="default" selected>Featured</option>
                                        <option value="name_asc">Name: A-Z</option>
                                        <option value="name_desc">Name: Z-A</option>
                                        <option value="price_asc">Price: Low to High</option>
                                        <option value="price_desc">Price: High to Low</option>
                                        <option value="best_selling">Best Selling</option>
                                    </select>
                                </div>

                                <div id="item-container">
                                    <!-- Dữ liệu sản phẩm sẽ được hiển thị tại đây -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="filtered-products" class="row col-100 mb-minus-24">
                        @foreach ($shop as $value)
                            <div class="col-xxl-3 col-xl-4 col-6 cr-product-box mb-24">
                                <div class="cr-product-card">
                                    <div class="cr-product-image">
                                        <div class="cr-image-inner zoom-image-hover">
                                            <img src="{{ asset('storage/images/' . $value->image) }}" alt="product-1">
                                        </div>
                                        <div class="cr-side-view">
                                            <a href="javascript:void(0)" class="wishlist">
                                                <i class="ri-heart-line"></i>
                                            </a>
                                            <a class="model-oraganic-product" data-bs-toggle="modal" href="#quickview"
                                                role="button">
                                                <i class="ri-eye-line"></i>
                                            </a>
                                        </div>
                                        <a class="cr-shopping-bag" href="javascript:void(0)">
                                            <i class="ri-shopping-bag-line"></i>
                                        </a>
                                    </div>
                                    <div class="cr-product-details">
                                        <div class="cr-brand">
                                            <a href="shop-left-sidebar.html">{{ $value->category->name }}</a>
                                            <div class="cr-star">
                                                @php
                                                    $rating = $value->averageRating();
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
                                        <a href="{{ route('detail', ['product' => $value->category->parent->slug, 'slug' => $value->slug]) }}"
                                            class="title">{{ $value->name }}</a>
                                        <p class="text">{{ $value->sortdescription }}.</p>
                                        <ul class="list">
                                            <li><label>Brand :</label>ESTA BETTERU CO</li>
                                            <li><label>Diet Type :</label>Vegetarian</li>
                                            <li><label>Speciality :</label>Gluten Free, Sugar Free</li>
                                        </ul>
                                        <p class="cr-price"><span
                                                class="new-price">{{ number_format($value->variants->first()->sale_price) }}đ</span>
                                            <span
                                                class="old-price">{{ number_format($value->variants->first()->price) }}đ</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
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
                    </nav>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var categories = document.querySelectorAll('.category');
            var minPrice = document.querySelector('#min_price');
            var maxPrice = document.querySelector('#max_price');
            var btnFilter = document.querySelector('#filter');
            categories.forEach(function(checkbox) {
                checkbox.addEventListener('change', function() {

                    var categoryId = checkbox.closest('.checkbox-group').getAttribute('data-id');
                    // console.log('categoryId:', categoryId);

                    var selectedCategories = [];

                    document.querySelectorAll('.category:checked').forEach(function(checked) {
                        selectedCategories.push(checked.value);
                    });

                    // console.log('selectedCategories:', selectedCategories);

                    axios.post('{{ route('filterByCategory', ['id' => ':categoryId']) }}'.replace(
                            ':categoryId', categoryId), {
                            categories: selectedCategories
                        })
                        .then(response => {
                            // console.log(response.data);
                            updateProductDisplay(response.data.products, response.data
                                .image_path);
                        })
                        .catch(error => {
                            console.error('Error:', error);
                        });
                });
            });
            btnFilter.addEventListener('click', function(event) {
                event.preventDefault();

                var minVal = minPrice.value.trim();
                var maxVal = maxPrice.value.trim();

                axios.get('{{ route('filter') }}', {
                        params: {
                            min_price: minVal,
                            max_price: maxVal
                        }
                    })
                    .then(function(response) {
                        updateProductDisplay(response.data.products, response.data.image_path);
                    })
                    .catch(function(error) {
                        console.error('Error: ', error);
                    });
            });


        });
    </script>
    <script>
         const selectElement = document.getElementById('sortBy');
            // console.log(selectElement);
            selectElement.addEventListener('change', function() {
                const sort = this.value;
                // console.log(sort);
                axios.get('{{ route('filter_name') }}', {
                        params: {
                            sort: sort
                        }
                    })
                    .then(function(response) {
                        // console.log(response.data);
                        updateProductDisplay(response.data.products, response.data.image_path);
                    })
                    .catch(function(error) {
                        console.error(error);
                    });
            });
    </script>
    <script>
        $(function() {
            $("#slider-ranges").slider({
                range: true,
                min: 0,
                max: 1000000, // Giới hạn tối đa là 5 triệu VNĐ
                values: [0, 1000000], // Slider ban đầu từ 0 đến 5 triệu VNĐ
                slide: function(event, ui) {
                    // Format và hiển thị giá trị
                    $("#amounts").val(formatCurrency(ui.values[0]) + " - " + formatCurrency(ui.values[
                        1]));
                    $("#min_price").val(ui.values[0]);
                    $("#max_price").val(ui.values[1]);
                }
            });
            // Hiển thị giá trị ban đầu của slider
            $("#amounts").val(formatCurrency($("#slider-ranges").slider("values", 0)) +
                " - " + formatCurrency($("#slider-ranges").slider("values", 1)));

            function formatCurrency(amount) {
                // Hàm định dạng số tiền sang đơn vị VNĐ
                return new Intl.NumberFormat('vi-VN', {
                    style: 'currency',
                    currency: 'VND'
                }).format(amount);
            }
        });
    </script>
@endsection
