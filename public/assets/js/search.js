document.addEventListener('DOMContentLoaded', function () {
    var filterElements = document.querySelectorAll('li[data-id]');
    var all = document.querySelector('#all');
    var selectedCategories = [];

    if (all) {
        all.addEventListener('click', function () {
            selectedCategories = [];
            axios.post(filterByCategoryRoute.replace(':categoryId', 'all'), {
                categories: selectedCategories
            })
                .then(response => {
                    // console.log(response.data);
                    updateProductDisplay(response.data.products, response.data.image_path);
                })
                .catch(error => {
                    console.error('Error:', error);
                });

            // Bỏ class 'active' khỏi tất cả các filterElements
            filterElements.forEach(function (element) {
                element.classList.remove('active');
            });

            // Thêm class 'active' cho nút "all"
            all.classList.add('active');
        });
    }

    filterElements.forEach(function (e) {
        e.addEventListener('click', function () {
            var categoryId = e.getAttribute('data-id');
            selectedCategories = [categoryId];
            axios.post(filterByCategoryRoute.replace(':categoryId', categoryId), {
                categories: selectedCategories
            })
                .then(response => {
                    updateProductDisplay(response.data.products, response.data.image_path);
                })
                .catch(error => {
                    console.error('Error:', error);
                });

            // Bỏ class 'active' khỏi tất cả các filterElements
            filterElements.forEach(function (element) {
                element.classList.remove('active');
            });

            // Thêm class 'active' cho phần tử hiện tại
            e.classList.add('active');
        });
    });

    var links = document.querySelectorAll('.getCategory');
    links.forEach(function (links) {
        links.addEventListener('click', function (e) {
            var name = e.target.innerText.trim();
            console.log(name);
            // axios.get(category + name)
            //     .then(function (response) {
            //         // Xóa nội dung cũ
            //         var tabList = document.querySelector('.tab-list.row');
            //         tabList.innerHTML = '';

            //         // Thêm nội dung mới
            //         response.data.forEach(function (product) {
            //             var col = document.createElement('div');
            //             col.classList.add('col');
            //             col.innerHTML = `
            //             <h6 class="cr-col-title">${product.name}</h6>
            //             <ul class="cat-list">
            //                 <li><a href="shop-left-sidebar.html">${product.name}</a></li>
            //             </ul>
            //         `;
            //             tabList.appendChild(col);
            //         });

            //     })
            //     .catch(function (error) {
            //         console.error('Có lỗi xảy ra:', error);
            //     });
        });
    });
});
