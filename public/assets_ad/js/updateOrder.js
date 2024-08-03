document.addEventListener('DOMContentLoaded', function () {
    const statusSelect = document.getElementById('statusSelect');
    console.log(statusSelect);
    statusSelect.addEventListener('change', function () {
        const status = statusSelect.value;
        const id = statusSelect.getAttribute('data-id');
        console.log(id);
        axios.post(`/admin/updateOrder/${id}`, {
            status: status,
        })
            .then(response => {
                console.log(response.data);
                alert('Trạng thái đơn hàng đã được cập nhật!');
            })
            .catch(error => {
                console.error(error);
                alert('Có lỗi xảy ra, vui lòng thử lại!');
            });
    })

});

