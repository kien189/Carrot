document.addEventListener('DOMContentLoaded', function() {
    var filterElements = document.querySelectorAll('li[data-id]');
    var all = document.querySelector('#all');
    var selectedCategories = [];

    if (all) {
        all.addEventListener('click', function() {
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
            filterElements.forEach(function(element) {
                element.classList.remove('active');
            });

            // Thêm class 'active' cho nút "all"
            all.classList.add('active');
        });
    }

    filterElements.forEach(function(e) {
        e.addEventListener('click', function() {
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
            filterElements.forEach(function(element) {
                element.classList.remove('active');
            });

            // Thêm class 'active' cho phần tử hiện tại
            e.classList.add('active');
        });
    });
});
