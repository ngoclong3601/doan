// function DatHang(){
//     console.log('abc');
//     $.ajax({
//       url: `/checkou1`,
//       type: 'get',
//       data:'',
//       success: function (result) {
//         // location.reload()
//       }
//     });
//   };

const DatHang = () => {
    var name = $('#checkoutname').val();
    var phone = $('#checkoutphone').val();
    var address = $('#checkoutaddress').val();
    var email = $('#checkoutemail').val();


    $.post("/checkout1",
        {
            name:name,
            phone:phone,
            address:address,
            email:email

        },
        function (data, status) {
            console.log(data,'datadata')
            
        });
}