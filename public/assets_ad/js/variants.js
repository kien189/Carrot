
let variantIndex = 1;

function addVariant() {
    const variantsDiv = document.getElementById('variants');
    const variantDiv = document.createElement('div');
    variantDiv.innerHTML = `
                                <p>Biến thể : ${variantIndex}</p>
                                        <div id="variants" class=" row g-3">
                                                <div class="col-md-12 mb-25">
                                                    <label class="form-label">Size</label>
                                                    <div class="form-checkbox-box" >
                                                         <div class="form-check form-check-inline">
                                                            <input type="radio" name="variants[${variantIndex}][size]"
                                                                value="250g">
                                                            <label>250g</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" name="variants[${variantIndex}][size]"
                                                                value="500g">
                                                            <label>500g</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" name="variants[${variantIndex}][size]"
                                                                value="1kg">
                                                            <label>1kg</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" name="variants[${variantIndex}][size]"
                                                                value="2kg">
                                                            <label>2kg</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" name="variants[${variantIndex}][size]"
                                                                value="3kg">
                                                            <label>3kg</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" name="variants[${variantIndex}][size]"
                                                                value="4kg">
                                                            <label>4kg</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" name="variants[${variantIndex}][size]"
                                                                value="5kg">
                                                            <label>5kg</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label class="form-label">Price <span>( In VND
                                                            )</span></label>
                                                    <input type="number" class="form-control" name="variants[${variantIndex}][price]"
                                                        id="price1">
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label">Sale Price <span>( In VND
                                                            )</span></label>
                                                    <input type="number" class="form-control"
                                                        name="variants[${variantIndex}][sale_price]" id="sale_price1">
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label">Quantity</label>
                                                    <input type="number" class="form-control" id="quantity1"
                                                        name="variants[${variantIndex}][quantity]" id="price1">
                                                </div>
                                            </div>
                                    `;
    variantsDiv.appendChild(variantDiv);
    variantIndex++;
}

function ChangeToSlug() {
    var title, slug;

    //Lấy text từ thẻ input title
    title = document.getElementById("NamePro").value;

    //Đổi chữ hoa thành chữ thường
    slug = title.toLowerCase();

    //Đổi ký tự có dấu thành không dấu
    slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
    slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
    slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
    slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
    slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
    slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
    slug = slug.replace(/đ/gi, 'd');
    //Xóa các ký tự đặt biệt
    slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
    //Đổi khoảng trắng thành ký tự gạch ngang
    slug = slug.replace(/ /gi, "-");
    //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
    //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
    slug = slug.replace(/\-\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-/gi, '-');
    slug = slug.replace(/\-\-/gi, '-');
    //Xóa các ký tự gạch ngang ở đầu và cuối
    slug = '@' + slug + '@';
    slug = slug.replace(/\@\-|\-\@|\@/gi, '');
    //In slug ra textbox có id “slug”
    document.getElementById('slug').value = slug;
}
ClassicEditor
.create(document.querySelector('#editor1'))
.then(editor => {
    console.log(editor);
})
.catch(error => {
    console.error(error);
});
