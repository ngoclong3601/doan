<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use Response;

use Session;

class SendEmailController extends Controller{
    function index(){
        return view('send-mail');
    }
    function send(Request $request){
        // $this->validate($request, [
        //     'name'   =>     'required',
        //     'email'  =>     'required|email',
        //     'phone'  =>     'required',
        //     'address' =>    'required',
        //     'message' =>    'required',  
        // ]);
        $data = array(
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'email' => $request->email,
            'cart' => Cart::content(),
        );  
        Mail::to($request->email)->send(new SendMail($data));
        return back()->with('success','Thank for contacting us');
        
    }
}