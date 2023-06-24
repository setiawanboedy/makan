<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KulinerPlace;

class KulinerController extends Controller
{
    public function index(Request $request)
    {
        $items = KulinerPlace::get();

        return view('pages.kuliner',[
            'items'=>$items
        ]);
    }
}
