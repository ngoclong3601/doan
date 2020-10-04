<p>Xin Chào,  {{$data['name']}}</p> <br>
<p>Cảm ơn bạn đã tin tưởng đặt thức ăn ở cửa hàng 
chúng tôi</p>
<P>Dưới đây là thông tin của bạn:</P>
<ul>
<li>
    <div>
        Tên: {{$data['name']}} <br>
        Số điện thoại: {{$data['phone']}} <br>
        Địa chỉ giao hàng: {{$data['address']}}
    </div>
</li>
</ul>
<h1>Dưới đây là các mặt hàng của bạn:</h1>
<ul>
@foreach ($data['cart'] as $item)
<li>
    <div>
        Tên hàng: {{$item->name}} <br>
        Số lượng: {{$item->qty}} <br>
        Tổng tiền: {{Cart::subtotal()}} $
    </div>
</li>
@endforeach
</ul>
