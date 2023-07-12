<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Cart;
use App\Models\CartHeader;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\TransactionDetailHeader;

class CartController extends Controller
{
    public function cartList()
    {
        $userId = Auth::user()->id;
        $cartHeaders = CartHeader::with(['carts'])->where('user_id', $userId)->get();


        $cartItems = Cart::where('user_id',$userId)->get();

        $foods = collect($cartItems);

        $subtotal = $foods->sum('total');
        $pajak = ($subtotal*10)/100;
        $total = $subtotal+$pajak;
        return view('pages.cart', [
            'cartHeaders'=>$cartHeaders,
            'total'=> $total,
            'pajak'=>$pajak
        ]);
    }

    public function updateCart(Request $request)
    {
        $data = $request->all();
        $userId = Auth::user()->id;
        $cart = Cart::where('food_id',$request->food_id)->first();
        $data['quantity'] = $request->quantity;
        $data['total'] = $cart->price * $data['quantity'];
        $data['user_id'] = $userId;
        $cart->update($data);

        return redirect()->route('cart.list');
    }

    public function removeCart($id)
    {

        $cart = Cart::findOrFail($id);
        $cart->delete();
        return redirect()->route('cart.list');
    }

    public function removeCartHeader($id)
    {

        $cart_header = CartHeader::findOrFail($id);
        Cart::where('header_id', $cart_header->id)->delete();
        $cart_header->delete();
        return redirect()->route('cart.list');
    }

    public function checkout(Request $request)
    {
        $request->validate([
            'date'=> 'required',
            'time'=> 'required',
        ]);
        $data = $request->all();
        $userId = Auth::user()->id;

        $transaction = Transaction::create([
            'users_id' => $userId,
            'date' => $request->date,
            'time' => $request->time,
            'transaction_total' => $request->transaction_total,
            'transaction_status' => 'PENDING'
        ]);

        $cart_headers = CartHeader::where('user_id', $userId)->get();
        for ($i=0; $i < count($cart_headers); $i++) {
            $transactionHeaders = TransactionDetailHeader::create([
                'transaction_id'=> $transaction->id,
                'name_place'=> $cart_headers[$i]->place->name,
                'booking_number'=> $cart_headers[$i]->nomer,
            ]);

            $carts = $cart_headers[$i]->carts;
            for ($j=0; $j < count($carts); $j++) {

                TransactionDetail::create([
                    'transactionHeader_id'=> $transactionHeaders->id,
                    'food_id'=> $carts[$j]->food_id,
                    'image'=> $carts[$j]->image,
                    'name'=>$carts[$j]->name,
                    'price'=>$carts[$j]->price,
                    'quantity'=>$carts[$j]->quantity,
                    'total'=> $carts[$j]->total
                ]);
            }

        }

            return view('pages.payment-confirm', ['trans_id'=>$transaction->id]);

    }
}
