<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KulinerPlace;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $itemPlaces = KulinerPlace::get();

        // origin
        $originLatlng = "-8.581388508596651,116.10137723105744";

        $item = $itemPlaces->each(fn($item) => $item->latlng = number_format($this->calculateDistance($originLatlng, $item->latlng), 0, ',', '.'))->each;

        return view('pages.home',[
            'items'=>$item->attributes
        ]);
    }


    private function calculateDistance($originLatlng, $destLatlng)
    {
        $originLatlngStr = explode(",", $originLatlng);
        $destLatlngStr = explode(",", $destLatlng);

        $originLat = floatval($originLatlngStr[0]);
        $originLng = floatval($originLatlngStr[1]);

        $destLat = floatval($destLatlngStr[0]);
        $destLng = floatval($destLatlngStr[1]);



        $earthRadius = 9277; // Earth's radius in kilometers but i have modify

        // Convert latitude and longitude from degrees to radians
        $originLat = deg2rad($originLat);
        $originLng = deg2rad($originLng);
        $destLat = deg2rad($destLat);
        $destLng = deg2rad($destLng);

        $deltaLat = $destLat - $originLat;
        $deltaLon = $destLng - $originLng;

        $a = sin($deltaLat / 2) * sin($deltaLat / 2) + cos($originLat) * cos($destLat) * sin($deltaLon / 2) * sin($deltaLon / 2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

        // Calculate the distance in kilometers
        $distanceInKm = $earthRadius * $c;

        return $distanceInKm;

    }

    public function test(Request $request){
        $name = $request->name;
        $age = $request->age;
        dd($name);
    }
}
