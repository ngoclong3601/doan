function XoaSanPham(foodid){

    console.log(foodid);
            $.ajax({
                url: `/api/deleteSP/${foodid}`,
                type: 'DELETE',
                success: function(result){
                    console.log('ok')
                    $('#table-sanpham').load(' #table-sanpham')
                    // location.reload()
                }       
            });
    }