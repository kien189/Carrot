// document.addEventListener('DOMContentLoaded', function () {
//     const productButtons = document.querySelectorAll('.model-oraganic-product');

//     productButtons.forEach(function (button) {
//         button.addEventListener('click', function () {
//             const proId = button.getAttribute('data_id');

//             axios.get(`/products/${proId}`)
//                 .then(res => {
//                     const product = res.data;
//                     console.log(product); // Debug: Log dữ liệu sản phẩm để kiểm tra

//                     var modal = document.querySelector('#quickview');
//                     modal.querySelector('.heading').textContent = product.name;
//                     modal.querySelector('.description').innerHTML = product
//                         .sortdescription;
//                     modal.querySelector('.product-image').src =
//                     assetUrl + '/' + product.image;
//                     modal.querySelector('#review').innerHTML =
//                         `(${product.ratings.length} Review${product.ratings.length !== 1 ? 's' : ''})`;
//                     var variants = product.variants;
//                     var defaultVariant = variants[
//                         0]; // Chọn biến thể đầu tiên làm mặc định

//                     // Cập nhật giá và giá cũ
//                     updatePrice(defaultVariant.price, defaultVariant.sale_price);

//                     // Cập nhật số sao, số lượng đánh giá và giá bình luận
//                     updateRatings(product.average_rating, product.review_count);

//                     // Hiển thị các size
//                     var sizeContainer = modal.querySelector(
//                         '.cr-size-weight .cr-kg ul');
//                     sizeContainer.innerHTML = '';
//                     variants.forEach(function (variant, index) {
//                         var li = document.createElement('li');
//                         li.textContent = variant.size;
//                         li.classList.add('variant-size');
//                         li.setAttribute('data-id', variant
//                             .id); // Thiết lập data-id cho từng size tương ứng
//                         if (index === 0) {
//                             li.classList.add(
//                                 'active-color'
//                             ); // Đặt lớp active cho size đầu tiên
//                         }
//                         sizeContainer.appendChild(li);
//                     });

//                     // Xử lý sự kiện click cho từng size
//                     sizeContainer.addEventListener('click', function (event) {
//                         var target = event.target;
//                         if (target && target.classList.contains(
//                             'variant-size')) {
//                             var variantId = target.getAttribute('data-id');
//                             var selectedVariant = variants.find(variant =>
//                                 variant.id === parseInt(variantId));
//                             if (selectedVariant) {
//                                 updatePrice(selectedVariant.price,
//                                     selectedVariant.sale_price);
//                                 // Xử lý việc thay đổi lớp active khi click
//                                 var currentActive = sizeContainer.querySelector(
//                                     '.active-color');
//                                 if (currentActive) {
//                                     currentActive.classList.remove(
//                                         'active-color');
//                                 }
//                                 target.classList.add('active-color');
//                             }
//                         }
//                     });

//                     // Sự kiện click để thêm sản phẩm vào giỏ hàng
//                     modal.querySelector('.cr-button').addEventListener('click',
//                         function () {
//                             var productId = product.id; // Lấy id của sản phẩm
//                             var selectedVariantId = defaultVariant
//                                 .id; // Lấy id của biến thể (variant)

//                             // Gọi hàm để thêm sản phẩm vào giỏ hàng (ví dụ)
//                             addToCart(productId, selectedVariantId);
//                         });

//                     // Hàm cập nhật giá
//                     function updatePrice(price, sale_price) {
//                         var priceContainer = modal.querySelector('.cr-product-price');
//                         var newPriceElement = priceContainer.querySelector(
//                             '.new-price');
//                         var oldPriceElement = priceContainer.querySelector(
//                             '.old-price');

//                         if (sale_price !== undefined) {
//                             newPriceElement.textContent = sale_price.toLocaleString(
//                                 'vi-VN', {
//                                 style: 'currency',
//                                 currency: 'VND'
//                             });
//                         } else {
//                             newPriceElement.textContent =
//                                 'N/A'; // Xử lý khi giá không tồn tại
//                         }

//                         if (price !== undefined) {
//                             oldPriceElement.textContent = price.toLocaleString(
//                                 'vi-VN', {
//                                 style: 'currency',
//                                 currency: 'VND'
//                             });
//                         } else {
//                             oldPriceElement.textContent =
//                                 ''; // Xử lý khi giá cũ không tồn tại
//                         }
//                     }

//                     // Hàm cập nhật số sao, số lượng đánh giá và giá bình luận
//                     function updateRatings(averageRating) {
//                         var starContainer = modal.querySelector(
//                             '.cr-review-star .cr-star');

//                         // Xử lý số sao
//                         var numStars = 5; // Số sao tối đa hiển thị
//                         var fullStars = Math.floor(averageRating);
//                         var halfStars = Math.ceil(averageRating) - fullStars;

//                         starContainer.innerHTML = ''; // Xóa các sao hiện tại
//                         for (var i = 0; i < fullStars; i++) {
//                             var star = document.createElement('i');
//                             star.classList.add('ri-star-fill');
//                             starContainer.appendChild(star);
//                         }
//                         if (halfStars > 0) {
//                             var halfStar = document.createElement('i');
//                             halfStar.classList.add('ri-star-half-fill');
//                             starContainer.appendChild(halfStar);
//                         }
//                         var emptyStars = numStars - fullStars - (halfStars > 0 ? 1 : 0);
//                         for (var j = 0; j < emptyStars; j++) {
//                             var emptyStar = document.createElement('i');
//                             emptyStar.classList.add('ri-star-line');
//                             starContainer.appendChild(emptyStar);
//                         }

//                         // Hiển thị số lượng đánh giá

//                     }

//                 })
//                 .catch(error => {
//                     console.error('Error fetching product:', error); // Xử lý lỗi nếu có
//                 });
//         });
//     });

//     // Hàm để thêm sản phẩm vào giỏ hàng
//     function addToCart(productId, variantId) {
//         var quantity = document.querySelector('.quantity').value;
//         var button = document.querySelector('.cr-button');
//         button.disabled = true;
//         axios.post(`/addToCartJs/${productId}`, {
//             variant_id: variantId,
//             quantity: quantity
//         })
//         .then(response => {
//             console.log( response.data);
//             })
//         .catch(error => {
//             console.error('Error adding product to cart:', error);
//         });
//     }

// });

