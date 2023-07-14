<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KulinerPlace;
use App\Http\Controllers\CalculateDistanceController;

class HomeController extends Controller
{
    public function index(Request $request, CalculateDistanceController $distance)
    {
        $itemPlaces = KulinerPlace::get();

        // origin
        $originLatlng = "-8.581388508596651,116.10137723105744";

        $item = $itemPlaces->each(fn($item) => $item->latlng = number_format($distance->calculateDistance($originLatlng, $item->latlng), 1, ',', '.'))->each;
        $filterItems = $item->getAttributes()->sortBy('latlng');
        return view('pages.home',[
            'items'=>$filterItems
        ]);
    }

    public function find(Request $request){
        $originLatlng = $request->lat.','.$request->lng;

        return redirect()->route('kuliner-near.index', [
            'originLatlng'=>$originLatlng
        ]);
    }

}
