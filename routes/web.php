<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/chitiet',function(){
    $user=DB::table('food')->get();
    return $user;
});
Route::get('GoiController','HomeController@Home');
Route::get('/menu',function(){
    return view('menu');
 });
//Route::get('/home','HomeController@Home');

Route::get('/about',function(){
    return view('about');
});
Route::get('/contact-us',function(){
    return view('contact-us');
});
Route::get('/test',function(){
    $users = DB::table('food')->select('foodname', 'img')->get();
    // return $users;
    return view('test',['users'=>$users]);
});
Route::get('/home',function(){
    $users = DB::table('food')->select('foodid','foodname','price' ,'img')->get();
    return view('index',['users'=>$users]);
});
Route::get('/menu',function(){
    $users = DB::table('food')->select('foodid','foodname','price' ,'img')->get();
    return view('menu',['users'=>$users]);
});


// Route::get('/adminpage', function(){
//     return view('adminpage');
// });
// Route::get('/userpage', function(){
//     return view('userpage');
// });
Route::get('/userpage', function(){
    $users=DB::table('users')->select('id','name','email','phone')->get();
    return view('userpage',['users'=>$users]);
})->middleware('adminLogin');
Route::get('/orderpage',function(){
    $users=DB::table('order')->select('orderid','foodid','quantity','customerid','total')->get();
    return view('orderpage',['users'=>$users]);
});
// Route::get('/email',function(){
//     $users=DB::table('customer')->select('customerid','name','address','phone','email')->get();
//     return view('blanks',['users'=>$users]);
// });


Route::get('/foodDetail/{id}',function($id){
    $food=DB::table('food')->where('foodid', '=', $id)->get();
    return view('foodDetail',['food'=>$food[0]]);
});
Route::post('/cart', 'CartController@add');
Route::get('/increaseCartItem/{id}', 'CartController@increaseCartItem');
Route::get('/decreaseCartItem/{id}', 'CartController@decreaseCartItem');
Route::get('/removeCartItem/{id}','CartController@removeitem');
Route::get('/checkout', 'CartController@checkout');
Route::post('/checkout1','CartController@postCheckout');
Route::post('/addSP',function(Request  $req){
    $foodName= $req->input('foodname');
    $price=$req->input('price');
    $quantity=$req->input('quantity');
    $img=$req->input('img');
    DB::table('food')->insert([
        [
            'foodname' => $foodName,
            'price' => $price,
            'quantity' =>$quantity,
            'img' =>$img,
        ],
    ]);
    return redirect('/adminpage');
});


Route::get('/removeitem/{id}','CartController@removeitem');
Route::get('/sendemail','SendEmailController@index');
Route::post('/sendemail/send','SendEmailController@send');
// Route::get('/', 'UserController@getLogin');
// Route::((post('/login/adminpage', 'UserController@postLogin');
Route::group(['middleware'=>'adminLogin'],function(){
    Route::get('/adminpage', function(){
        $users =DB::table('food')->select('foodid','foodname','price','quantity')->get();
        // return $users;
        return view('adminpage',['users'=>$users]);
    });
});
   
    
 Route::get('/login', 'MainController@index');
 Route::post('/login/checklogin', 'MainController@checklogin');
 //  Route::get('login/adminpage', 'MainController@successlogin');

Route::get('/logout', function(){
    Auth::logout();
    return Redirect::to('login');
 });
 Route::get('/laythongtin/{id}', 'CartController@getItemInfo');
 Route::post('/timkiem','SearchController@Search');

 Route::get('/model/food/all', function(){
    $food= App\Food::all()->toArray();
    var_dump($food);
 });



