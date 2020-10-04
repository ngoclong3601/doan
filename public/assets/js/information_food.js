



$('#test').click(function(){
    var tien='$14.5'
    tien=tien.replace('$','');
    // "14.5"
    var soluong=$("#sl").val()
    tien=tien*soluong // 14.5
    tien="$"+tien
    console.log(tien)
})

function muahang(){
    var tien='$14.5'
    tien=tien.replace('$','');
    // "14.5"
    var soluong=$("#sl").val()
    tien=tien*soluong // 14.5
    tien="$"+tien
    console.log(tien)
};
