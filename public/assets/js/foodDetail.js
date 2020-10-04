$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  })

// nhung dong code nay se tu dong chay khi reload trang
var idSanpham=$('#idFood').text()
console.log(idSanpham)
$.get("/laythongtin/"+idSanpham, function(data, status){
    console.log(data);
    var soLuong=data.qty;
       $('#check').attr('value',soLuong)
  });

function muahang(){
    var tien='$14.5'
    tien=tien.replace('$','');
    // "14.5"
    var soluong=$("#sl").val()
    tien=tien*soluong // 14.5
    tien="$"+tien
    console.log(tien)
};



function increaseCartItem(id) {
    var kq=$.get(`/increaseCartItem/${id}`, function (data, status) {
       var soLuong=data.qty;
       $('#check').attr('value',soLuong)
    });
 
}


function decreaseItem  (id){
    var kq=$.get(`/decreaseCartItem/${id}`, function (data, status) {
        var  soLuong=data.qty;
        $('#check').attr('value',soLuong)
    });
}