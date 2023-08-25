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
    public function index(Request $request, $id)
    {
        $item = KulinerPlace::findOrFail($id);

        return view('pages.kuliner-food',[
            'item'=>$item,

        ]);
    }

    public function addToCart(Request $request)
    {
        $data = $request->all();
        $idItem = Cart::where('food_id',$request->product_id)->first();
        $userId = Auth::user()->id;
        if ($idItem) {
            $cart = Cart::where('food_id',$request->product_id)->first();

            $data['quantity'] = $cart->quantity + $request->quantity;
            $data['total'] = $cart->total * $request->quantity;
            $data['user_id'] = $userId;
            $cart->update($data);
        }else{
            $data['total'] = $request->price * $request->quantity;
            $data['user_id'] = $userId;
            Cart::create($data);
        }

        return redirect()->route('cart.list');
    }

    public function externalLink(Request $request, $id){
        $user = Auth::user();
        $item = KulinerPlace::findOrFail($id);

        return redirect()->away("https://api.whatsapp.com/send?text=*Selamat%20datang%20di%20resto%20$item->name*%0ASilahkan%20mengisi%20format%20pemesanan%20berikut%3A%0A%0A*Pemesan*%20:%20$user->name%0A*No.%20Hp*%20%20%3A%20(No%20aktif%20yang%20bisa%20dihubungi)%0A*Waktu*%20%20%3A%20(Contoh%3A%2004.30%20sore)%0A*DP*%20%20%20%3A%20Rp%2020.000%0A*Makanan*%20:%20$request->name%20x1%0A%20%20%20%20*(Silahkan%20sesuaikan%20dan%20pisahkan%20dengan%20koma%20jika%20lebih%20dari%20satu%20makanan)%20%0A%0ASilahkan%20bayar%20DP%20ke%20rekening%20BRI%3A%20*081939293949*%20*Didi%20Pratama*%0Adan%20kirimkan%20bukti%20pembayaran%20ke%20wa%20ini.%0AKami akan infokan *nomor meja* yang tersedia setelah pembayaran.%0ATerimakasih%20%3A)&phone=$item->hp");
    }

}
