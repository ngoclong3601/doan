<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Model;

class SearchController extends Controller
{
    function Search(Request $request)
    {
        $tukhoa= $request->tukhoa;
        $users=food::where('TieuDe','like',"%$tukhoa%")->orwhere('TomTat','like',
        "%$tukhoa%")->take(10)->paginate(2);
        return view('search',['users'=>$users,'tukhoa'=>$tukhoa]);
    }
}
