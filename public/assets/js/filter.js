function updateProductDisplay(products, image_path) {
    var productContainer = document.querySelector('#filtered-products');
    productContainer.innerHTML = ''; // Clear existing products

    products.forEach(function (product) {
        // Check if product.category and product.category.name exist before accessing
        var categoryName = product.category && product.category.name ? product.category.name : '';

        // Check if product.variants is an array and has at least one item
        var salePrice = Array.isArray(product.variants) && product.variants.length > 0 ? product.variants[0].sale_price : 0;
        var price = Array.isArray(product.variants) && product.variants.length > 0 ? product.variants[0].price : 0;

        // Construct image source path with proper image_path concatenation
        var imageSrc = image_path + '/' + (product.image || ''); // Ensure correct image path construction

        // Calculate average rating (example value)
        var averageRating = product.averageRating || 0; // Assume averageRating is provided by the server

        // Round averageRating to the nearest 0.5
        var roundedRating = Math.round(averageRating * 2) / 2;

        // Generate star HTML based on roundedRating
        var starHTML = '';
        for (var i = 0; i < 5; i++) {
            if (i < roundedRating) {
                starHTML += '<i class="ri-star-fill"></i>'; // Full star
            } else {
                starHTML += '<i class="ri-star-line"></i>'; // Empty star
            }
        }

        // Construct HTML for each product dynamically
        var productHTML = `
            <div class="col-xxl-3 col-xl-4 col-6 cr-product-box mb-24">
                <div class="cr-product-card">
                    <div class="cr-product-image">
                        <div class="cr-image-inner zoom-image-hover">
                            <img src="${imageSrc}" alt="product-1">
                        </div>
                        <div class="cr-side-view">
                            <a href="javascript:void(0)" class="wishlist">
                                <i class="ri-heart-line"></i>
                            </a>
                            <a class="model-oraganic-product" data-bs-toggle="modal" href="#quickview" role="button">
                                <i class="ri-eye-line"></i>
                            </a>
                        </div>
                        <a class="cr-shopping-bag" href="javascript:void(0)">
                            <i class="ri-shopping-bag-line"></i>
                        </a>
                    </div>
                    <div class="cr-product-details">
                        <div class="cr-brand">
                            <a href="shop-left-sidebar.html">${categoryName}</a>
                            <div class="cr-star">
                                ${starHTML} <!-- Insert stars here -->
                                <p>(${averageRating.toFixed(1)})</p>
                            </div>
                        </div>
                        <a href="${product.category && product.category.slug ? product.category.slug + '/' + product.slug : '#'}" class="title">${product.name}</a>
                        <p class="text">${product.sortdescription || ''}.</p>
                        <ul class="list">
                            <li><label>Brand :</label>ESTA BETTERU CO</li>
                            <li><label>Diet Type :</label>Vegetarian</li>
                            <li><label>Speciality :</label>Gluten Free, Sugar Free</li>
                        </ul>
                        <p class="cr-price">
                            <span class="new-price">${salePrice.toLocaleString('vi-VN')}đ</span>
                            <span class="old-price">${price.toLocaleString('vi-VN')}đ</span>
                        </p>
                    </div>
                </div>
            </div>
        `;

        // Insert the constructed product HTML into the product container
        productContainer.insertAdjacentHTML('beforeend', productHTML);

        // Attach event listeners (move them outside if they should be attached globally)
        $('.wishlist').on("click", function () {
            $('.cr-wish-notify').remove();
            $('.cr-compare-notify').remove();
            $('.cr-cart-notify').remove();

            var isWishlist = $(this).hasClass("active");
            if (isWishlist) {
                $(this).removeClass("active");
                $('footer').after('<div class="cr-wish-notify"><p class="wish-note">Remove product on <a href="wishlist.html"> Wishlist</a> Successfully!</p></div>');
            } else {
                $(this).addClass("active");
                $('footer').after('<div class="cr-wish-notify"><p class="wish-note">Add product in <a href="wishlist.html"> Wishlist</a> Successfully!</p></div>');
            }

            setTimeout(function () {
                $('.cr-wish-notify').fadeOut();
            }, 2000);
        });

        $('.cr-shopping-bag').on("click", function () {
            $('.cr-wish-notify').remove();
            $('.cr-compare-notify').remove();
            $('.cr-cart-notify').remove();

            var isAddtocart = $(this).hasClass("active");
            if (isAddtocart) {
                $(this).removeClass("active");
                $('footer').after('<div class="cr-cart-notify"><p class="compare-note">Remove product in <a href="{{route("cart"}}> Cart</a> Successfully!</p></div>');
            } else {
                $(this).addClass("active");
                $('footer').after('<div class="cr-cart-notify"><p class="compare-note">Add product in <a href="{{route("cart"}}"> Cart</a> Successfully!</p></div>');
            }
            setTimeout(function () {
                $('.cr-cart-notify').fadeOut();
            }, 2000);
        });

    });
}
