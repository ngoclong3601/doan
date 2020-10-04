$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
})

const addToCart = (id) => {
    
    $.post("/cart",
        {
            product_id: id
        },
        function (data, status) {
            console.log(data,'datadata')
            alert('Đã thêm thành công sản phẩm: '+data.selectedProductName)
        });
}