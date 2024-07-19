document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.variant-size').forEach(function(item) {
        item.addEventListener('click', function() {
            let price = parseFloat(this.getAttribute('data-price'));
            let salePrice = parseFloat(this.getAttribute('data-sale-price'));

            let formattedPrice = price.toLocaleString('vi-VN', {
                style: 'currency',
                currency: 'VND'
            });
            let formattedSalePrice = salePrice.toLocaleString('vi-VN', {
                style: 'currency',
                currency: 'VND'
            });

            if (this.closest('.modal')) {
                let modal = this.closest('.modal');
                modal.querySelector('.product-price').textContent = formattedPrice;
                modal.querySelector('.sale-price').textContent = formattedSalePrice;
                modal.querySelector('#selected-variant-id').value = this.getAttribute('data-variant-id');
            } else {
                document.getElementById('product-price').textContent = formattedPrice;
                document.getElementById('sale-price').textContent = formattedSalePrice;
                document.getElementById('selected-variant-id').value = this.getAttribute('data-variant-id');
            }

            // console.log("Selected Variant ID:", this.getAttribute('data-variant-id'));
            // console.log("Formatted Price:", formattedPrice);
            // console.log("Formatted Sale Price:", formattedSalePrice);
        });
    });
});

function handleSizeSelection(element) {
    let price = parseFloat(element.getAttribute('data-price'));
    let salePrice = parseFloat(element.getAttribute('data-sale-price'));

    let formattedPrice = price.toLocaleString('vi-VN', {
        style: 'currency',
        currency: 'VND'
    });
    let formattedSalePrice = salePrice.toLocaleString('vi-VN', {
        style: 'currency',
        currency: 'VND'
    });

    if (element.closest('.modal')) {
        let modal = element.closest('.modal');
        modal.querySelector('.product-price').textContent = formattedPrice;
        modal.querySelector('.sale-price').textContent = formattedSalePrice;
        modal.querySelector('#selected-variant-id').value = element.getAttribute('data-variant-id');
    } else {
        document.getElementById('product-price').textContent = formattedPrice;
        document.getElementById('sale-price').textContent = formattedSalePrice;
        document.getElementById('selected-variant-id').value = element.getAttribute('data-variant-id');
    }
}




document.addEventListener("DOMContentLoaded", function () {
    const stars = document.querySelectorAll(".ri-star");
    const ratingInput = document.getElementById("rating-input");
    const btnSubmit = document.getElementById('btnSubmit')
    const commentsContainer = document.getElementById("comments-container");
    // console.log(userName);
    stars.forEach(star => {
        star.addEventListener("click", function () {
            const index = parseInt(star.getAttribute("data-index"));
            ratingInput.value = index; // Cập nhật giá trị rating vào input hidden
            updateStars(index); // Cập nhật trạng thái sao
        });
    });

    function updateStars(index) {
        stars.forEach((star, i) => {
            if (i < index) {
                star.classList.remove("ri-star-empty");
                star.classList.add("ri-star-filled");
            } else {
                star.classList.remove("ri-star-filled");
                star.classList.add("ri-star-empty");
            }
        });
    }

    // btnSubmit.addEventListener('click', function (e) {
    //     e.preventDefault();
    //     const rating = ratingInput.value;
    //     const productId = document.getElementById("product-id").value;
    //     const customerId = document.getElementById("customer-id").value;
    //     const content = document.getElementById("content").value;
    //     const userName = document.getElementById('customer-name').value;
    //     const date = new Date().toLocaleDateString('en-US', { month: 'short', day: '2-digit', year: 'numeric' });
    //   // Bạn có thể lấy tên người dùng từ thông tin đăng nhập

    //     axios.post(comment.replace(':product_id', productId), {
    //         rating: rating,
    //         product_id: productId,
    //         customer_id: customerId,
    //         content: content
    //     })
    //         .then(response => {
    //             console.log(response.data);
    //             addCommentToDOM(date, userName, rating, content); // Thêm bình luận mới vào DOM
    //             alert("Đánh giá của bạn đã được gửi!");
    //             document.getElementById("content").value = ''; // Xóa nội dung bình luận sau khi gửi
    //             updateStars(0); // Đặt lại trạng thái sao
    //             ratingInput.value = 0; // Đặt lại giá trị rating
    //         })
    //         .catch(error => {
    //             console.error(error);
    //             alert("Có lỗi xảy ra. Vui lòng thử lại.");
    //         });
    // });

    // function addCommentToDOM(date, userName, rating, content) {
    //     const commentElement = document.createElement("div");
    //     commentElement.classList.add("content");

    //     const starsHtml = Array.from({ length: 5 }, (_, i) => {
    //         return i < rating ? '<i class="ri-star-s-fill"></i>' : '<i class="ri-star-s-line"></i>';
    //     }).join('');

    //     const newCommentHtml = `
    //         <div class="content">
    //             <img src="assets/img/review/1.jpg" alt="review">
    //             <div class="details">
    //                 <span class="date">${date}</span>
    //                 <span class="name">${userName}</span>
    //             </div>
    //             <div class="cr-t-review-rating">
    //                 ${starsHtml}
    //             </div>
    //         </div>
    //         <p>${content}</p>
    //     `;

    //     commentElement.innerHTML = newCommentHtml;
    //     document.getElementById("comments-container").prepend(commentElement); // Thêm bình luận mới lên trên cùng
    // }


});

