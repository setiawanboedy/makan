<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KulinerPlace;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $items = KulinerPlace::get();
        
        return view('pages.home',[
            'items'=>$items
        ]);
    }
}
