document.addEventListener('DOMContentLoaded', function () {
    // Lấy tất cả các phần tử giỏ hàng trong danh sách và bảng
    var cartItemsList = document.querySelectorAll('.crcart-pro-items li');
    var cartItemsTable = document.querySelectorAll('tr.cr_cart');
    // Lấy tất cả các nút tăng và giảm số lượng
    var btnPlus = document.querySelectorAll('.btnPlus');
    var btnMinus = document.querySelectorAll('.btnMinus');
    // Lấy tất cả các phần tử hiển thị tổng phụ (subTotal)
    var subTotalElements = document.querySelectorAll('.subTotal');

    // Hàm cập nhật tổng phụ (subTotal)
    function updateTotal(cartItems) {
        let subTotal = 0;

        // Duyệt qua tất cả các phần tử giỏ hàng
        cartItems.forEach(function (item) {
            // Lấy giá và số lượng của từng sản phẩm
            let priceText = item.querySelector('#price').textContent;
            let price = parseInt(priceText.replace(/\D/g, '')); // Chuyển đổi giá thành số nguyên
            let quantity = parseInt(item.querySelector('.quantity').value); // Lấy số lượng sản phẩm
            let total = price * quantity; // Tính tổng giá cho sản phẩm đó
            subTotal += total; // Cộng tổng giá vào tổng phụ

            // Cập nhật hiển thị tổng giá cho sản phẩm đó
            let totalElement = item.querySelector('#toTal');
            totalElement.textContent = total.toLocaleString('vi-VN') + 'đ';
        });

        // Cập nhật hiển thị tổng phụ
        subTotalElements.forEach(function (element) {
            element.textContent = subTotal.toLocaleString('vi-VN') + 'đ';
        });
    }

    // Hàm cập nhật số lượng và giá trị trong phần tử còn lại
    function updateOtherElement(cartId, quantity) {
        // Tìm phần tử giỏ hàng trong danh sách và bảng dựa trên cartId
        var otherItemList = document.querySelector(`.crcart-pro-items li[data-cart-id="${cartId}"]`);
        var otherItemTable = document.querySelector(`tr.cr_cart[data-cart-id="${cartId}"]`);

        // Nếu tìm thấy phần tử trong danh sách
        if (otherItemList) {
            let quantityDisplay = otherItemList.querySelector('#quantityDisplay');
            let quantityInput = otherItemList.querySelector('.quantity');
            let priceText = otherItemList.querySelector('#price').textContent;
            let price = parseInt(priceText.replace(/\D/g, ''));
            let total = price * quantity;
            let toTal = otherItemList.querySelector('#toTal');

            // Cập nhật số lượng và tổng giá cho phần tử trong danh sách
            quantityInput.value = quantity;
            quantityDisplay.textContent = quantity;
            toTal.textContent = total.toLocaleString('vi-VN') + 'đ';
        }

        // Nếu tìm thấy phần tử trong bảng
        if (otherItemTable) {
            let quantityDisplay = otherItemTable.querySelector('#quantityDisplay');
            let quantityInput = otherItemTable.querySelector('.quantity');
            let priceText = otherItemTable.querySelector('#price').textContent;
            let price = parseInt(priceText.replace(/\D/g, ''));
            let total = price * quantity;
            let toTal = otherItemTable.querySelector('#toTal');

            // Cập nhật số lượng và tổng giá cho phần tử trong bảng
            quantityInput.value = quantity;
            quantityDisplay.textContent = quantity;
            toTal.textContent = total.toLocaleString('vi-VN') + 'đ';
        }
    }

    // Hàm xử lý khi nhấn nút tăng hoặc giảm số lượng
    function handleButtonClick(event) {
        // Tìm phần tử giỏ hàng gần nhất (li hoặc tr)
        let item = this.closest('li') || this.closest('tr');
        let cartId = item.getAttribute('data-cart-id');
        let quantityInput = item.querySelector('.quantity');
        let quantityDisplay = item.querySelector('#quantityDisplay');
        let toTal = item.querySelector('#toTal');
        let quantity = parseInt(quantityInput.value);

        // Tăng hoặc giảm số lượng dựa trên nút được nhấn
        if (event.target.classList.contains('btnPlus')) {
            quantity++;
        } else if (event.target.classList.contains('btnMinus') && quantity > 1) {
            quantity--;
        }

        // Cập nhật số lượng và hiển thị
        quantityInput.value = quantity;
        quantityDisplay.textContent = quantity;

        // Tính toán và cập nhật tổng giá cho sản phẩm
        let priceText = item.querySelector('#price').textContent;
        let price = parseInt(priceText.replace(/\D/g, ''));
        let total = price * quantity;
        toTal.textContent = total.toLocaleString('vi-VN');
        if (item.tagName.toLowerCase() === 'li') {
            updateTotal(cartItemsList);
        } else if (item.tagName.toLowerCase() === 'tr') {
            updateTotal(cartItemsTable);
        }
        // Cập nhật phần tử còn lại
        updateOtherElement(cartId, quantity);
        // Gửi yêu cầu cập nhật giỏ hàng tới server
        axios.post(updateCartRoute, {
            id: cartId,
            quantity: quantity
        })
            .then(response => {
                // console.log(response.data);
                // Chỉ gọi updateTotal sau khi nhận được phản hồi từ server
                // if (item.tagName.toLowerCase() === 'li') {
                //     updateTotal(cartItemsList);
                // } else if (item.tagName.toLowerCase() === 'tr') {
                //     updateTotal(cartItemsTable);
                // }
                // // Cập nhật phần tử còn lại
                // updateOtherElement(cartId, quantity);
            })
            .catch(error => {
                console.error(error);
            });
    }

    // Đảm bảo chỉ đính kèm sự kiện một lần
    btnPlus.forEach(function (button) {
        button.removeEventListener('click', handleButtonClick);
        button.addEventListener('click', handleButtonClick);
    });

    btnMinus.forEach(function (button) {
        button.removeEventListener('click', handleButtonClick);
        button.addEventListener('click', handleButtonClick);
    });

    // Kiểm tra giá trị của các phần tử giỏ hàng để đảm bảo không bị lặp lại
    // cartItemsList.forEach(function (item, index) {
    //     console.log(`Cart item list ${index}:`, item);
    // });

    // cartItemsTable.forEach(function (item, index) {
    //     console.log(`Cart item table ${index}:`, item);
    // });








    const btnDeleteCart = document.querySelectorAll('.btnDeleteCart');

    btnDeleteCart.forEach(function (button) {
        button.addEventListener('click', function (e) {
            e.preventDefault(); // Ngăn chặn hành động mặc định của form submit
            const cartId = button.getAttribute('data-id');

            axios.delete(`cart/deleteCart/${cartId}`)
                .then(res => {
                    console.log(res.data);
                    // Xử lý phản hồi thành công, ví dụ như cập nhật giao diện
                    button.closest('tr').remove(); // Xóa hàng trong bảng
                })
                .catch(err => {
                    console.error(err);
                    // Xử lý lỗi, ví dụ như hiển thị thông báo lỗi
                });
        });
    });
});
