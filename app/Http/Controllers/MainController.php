<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;



class MainController extends Controller
{
     function index()
    {
        return view('login');
    }
     function checklogin(Request $request)
    {
        // $this->validate($request,[
        //     'email'        => 'required|email',
        //     'password'     => 'required|alphaNum|min:3'
        // ]);
        $user_data = [
            'email'     => $request->email,
            'password'  => $request->password,
            
        ]; 
        // dd($user_data);
        if(Auth::attempt($user_data))
        {
            // dd(Auth::check());
            info('fffff');
            return redirect('adminpage');
           
        }
        else
        {
             info('sai');
            return back()->with('error', 'Wrong Login Detail');
        }
        //  function successlogin()
        // {
            
        //     return view('adminpage');
        // }
         function logout()
        {   
            
            Auth::logout();
            return redirect('login');
        }
    }
}
