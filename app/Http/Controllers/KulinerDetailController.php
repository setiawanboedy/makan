<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KulinerPlace;

class KulinerDetailController extends Controller
{
    public function index(Request $request, $id)
    {
        $item = KulinerPlace::with(['booking_numbers'])->findOrFail($id);
        return view('pages.kuliner-detail',[
            'item'=>$item
        ]);
    }
}
