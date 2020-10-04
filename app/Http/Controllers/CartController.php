<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\DB;
use Request;
use Response;

class CartController extends Controller
{
    public function add()
    {
        $product_id = Request::get('product_id');

        $product = DB::table('food')
            ->where('foodid', '=', $product_id)
            ->get();
        $product = $product[0];

        $priceWithoutDollar = $product->price;
        $priceWithoutDollar = str_replace('$', '', $priceWithoutDollar);

        Cart::add(array('id' => $product_id, 'name' => $product->foodname, 'qty' => 1, 'price' => $priceWithoutDollar, 'options' => ['image' => $product->img]));

        $cart = Cart::content();

        $total = Cart::total();
        $count = Cart::count();

        $data = (object) [
            'total' => $total,
            'count' => $count,
            'selectedProductName' => $product->foodname,
        ];
        return Response::json($data);
    }

    public function getItemInfo($id)
    {
        $thongTin =Cart::search(function($cartItem,$rowId) use ($id){
            if($cartItem->id==$id){
                return $cartItem->name;
            }
            
        });
        $thongTin =$thongTin->first();
        $result = [
            'id' => $thongTin->id,
            'name' => $thongTin->name,
            'price' => $thongTin->price,
            'qty' => $thongTin->qty,
            'subtotal' => $thongTin->subtotal,
            'totalAll' => Cart::subtotal(),
            'countAll' => Cart::count(),
            'image' => $thongTin->options->image,
        ];

        return $result;
    }

    public function increaseCartItem($id)
    {

        $cartRow = Cart::search(function ($cartItem, $rowId) use ($id) {

            if ($cartItem->id == $id) {
                return $cartItem->name;
            }
        });

        // them sp vao gio hang neu chua co
        $cartRow = $cartRow->first();

        if ($cartRow == null) {
            $product_id = $id;
            $product = DB::table('food')->where('foodid', '=', $product_id)->get();
            $product = $product[0];
            
            $priceWithoutDollar = $product->price;
            $priceWithoutDollar = str_replace('$', '', $priceWithoutDollar);

            Cart::add(array('id' => $product_id, 'name' => $product->foodname, 'qty' => 1, 'price' => $priceWithoutDollar, 'options' => ['image' => $product->img]));
        } else {
            $rowId = $cartRow->rowId;

            $item = Cart::get($rowId);

            Cart::update($rowId, $item->qty + 1);

            $result = [
                'id' => $cartRow->id,
                'name' => $cartRow->name,
                'price' => $cartRow->price,
                'qty' => $cartRow->qty,
                'subtotal' => $cartRow->subtotal,
                'totalAll' => Cart::subtotal(),
                'countAll' => Cart::count(),
                'image' => $cartRow->options->image,
            ];

            return $result;
        }


    }
    public function decreaseCartItem($id)
    {

        $cartRow = Cart::search(function ($cartItem, $rowId) use ($id) {

            if ($cartItem->id == $id) {
                return $cartItem->name;
            }
        });

        $cartRow = $cartRow->first();
        // cartrow null neu gio hang chua co mat hang nay
        if ($cartRow == null) {
            $product_id = $id;
            $product = DB::table('food')->where('foodid', '=', $product_id)->get();
            $product = $product[0];

            $priceWithoutDollar = $product->price;
            $priceWithoutDollar = str_replace('$', '', $priceWithoutDollar);

            Cart::add(array('id' => $product_id, 'name' => $product->foodname, 'qty' => 1, 'price' => $priceWithoutDollar, 'options' => ['image' => $product->img]));

            // gan gia tri cho cartRow
            $cartRow = Cart::search(function ($cartItem, $rowId) use ($id) {
                if ($cartItem->id == $id) {
                    return $cartItem->name;
                }
            });
            
            $cartRow = $cartRow->first();
            
        } else {
            $rowId = $cartRow->rowId;

            $item = Cart::get($rowId);

            Cart::update($rowId, $item->qty - 1);
            
        }
        
        $result = [
            'id' => $cartRow->id,
            'name' => $cartRow->name,
            'price' => $cartRow->price,
            'qty' => $cartRow->qty,
            'subtotal' => $cartRow->subtotal,
            'totalAll' => Cart::subtotal(),
            'countAll' => Cart::count(),
            'image' => $cartRow->options->image,
        ];
        return $result;
    }
    public function removeitem($id)
    {

        $cartRow = Cart::search(function ($cartItem, $rowId) use ($id) {
            // dd($cartItem);
            if ($cartItem->id == $id) {

                // sua -> name
                // dd($item);
                return $cartItem->name;
            }

        });
        $cartRow = $cartRow->first();
        $rowId = $cartRow->rowId;

        Cart::get($rowId);
        Cart::remove($rowId);
        return redirect('/checkout');
    }
    public function checkout()
    {
        $cart = Cart::content();
        // dd($cart);
        // sua ten view
        return view('checkout', array('cart' => $cart, 'title' => 'Welcome', 'description' => '', 'page' => 'home'));
    }

    // public function postCheckout(Request $req){
    //     $cart = Session::get('cart');
    //     //dd($cart);

    //     $customer = new Customer;

    //      //$customer->customer_id=$customer->id;
    //     $customer->name = Request::get('name');
    //     $customer->email =  Request::get('email');
    //     $customer->address =  Request::get('address');
    //     $customer->phone =  Request::get('phone');
    //     $customer->save();
    //     // dd($customer);

    //     $order = new Order;

    //     $order->total = Cart::subtotal();
    //     $order->id=$customer->id;
    //     $order->save();

    //     // dd($order);

    //     // Mail::send('mail.blanks',['customer'=>$customer,'cart'=>$cart,'bill'=>$bill], function($msg) use ($bill){
    //     //     $customer= Customer::where('id',$bill->id_customer)->first();
    //     //     ($customer);
    //     //     $msg->from('hcmqn2@gmail.com', 'WheyStore');
    //     //     $msg->to($customer->email)->subject('HÓA ĐƠN BÁN HÀNG');
    //     // });

    //     foreach ($cart->items as $key => $value) {
    //         $order_detail = new OrderDetail;
    //         $order_detail->order_id = $order->order_id;
    //         $order_detail->foodid = $key;
    //         $order_detail->quantity = $value['qty'];
    //         $order_detail->unit_price = ($value['price']/$value['qty']);
    //         $order_detail->save();
    //     }

    //     Session::forget('cart');
    //     return redirect()->back()->with('thongbao','Đặt hàng thành công');

    // }

}
