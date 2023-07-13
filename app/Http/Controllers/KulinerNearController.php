<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KulinerPlace;
use App\Http\Controllers\CalculateDistanceController;

class KulinerNearController extends Controller
{
    public function index(Request $request, CalculateDistanceController $distance, $originLatlng)
    {
        $itemPlaces = KulinerPlace::get();

        $item = $itemPlaces->each(fn($item) => $item->latlng = number_format($distance->calculateDistance($originLatlng, $item->latlng), 0, ',', '.'))->each;
        $filterItems = $item->getAttributes()->sortBy('latlng');
    
        return view('pages.kuliner-near',[
            'items'=>$filterItems
        ]);
    }
}
