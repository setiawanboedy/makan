<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KulinerPlace;
use App\Models\BookingNumber;
use App\Models\Food;
use App\Models\Cart;
use App\Models\CartHeader;
use Illuminate\Support\Facades\Auth;

class KulinerFoodController extends Controller
{
    public function index(Request $request)
    {
        $item = KulinerPlace::findOrFail($request->place_id);
        $number = BookingNumber::findOrFail($request->number_id);
        return view('pages.kuliner-food',[
            'item'=>$item,
            'number'=>$number,
        ]);
    }

    public function addToCart(Request $request)
    {
        $data = $request->all();
        // $idItem = Cart::where('food_id',$request->food_id)->first();
        $userId = Auth::user()->id;

        $cart_header_nomer = CartHeader::where('nomer_id', $request->nomer_id)->first();
        $cart_header_place = CartHeader::where('place_id', $request->place_id)->first();
        if ($cart_header_nomer && $cart_header_place) {

                $data['total'] = $request->price * $request->quantity;
                $data['user_id'] = $userId;
                $data['header_id'] = $cart_header_nomer->id;
                Cart::create($data);

        } else {
            $cartHeader = CartHeader::create([
                'user_id'=> $userId,
                'place_id'=> $request->place_id,
                'nomer_id'=> $request->nomer_id,
                'nomer'=>$request->nomer,
            ]);
            $data['total'] = $request->price * $request->quantity;
            $data['user_id'] = $userId;
            $data['header_id'] = $cartHeader->id;
            Cart::create($data);
        }


        return redirect()->route('cart.list');
    }

}
