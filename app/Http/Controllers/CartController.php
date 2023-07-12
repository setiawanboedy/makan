<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Cart;
use App\Models\CartHeader;
use App\Models\Transaction;
use App\Models\TransactionDetail;

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
            'date'=> 'required|date',
            'time'=> 'required',
        ]);
        $data = $request->all();
        $userId = Auth::user()->id;

        $transaction = Transaction::create([
            'users_id' => $userId,
            'name_place'=> '',
            'booking_number'=> 1,
            'date' => $request->date,
            'time' => $request->time,
            'transaction_total' => $request->transaction_total,
            'transaction_status' => 'PENDING'
        ]);

        $carts = Cart::where('user_id', $userId)->get();
        for ($i=0; $i < count($carts); $i++) {

            TransactionDetail::create([
                'transaction_id'=> $transaction->id,
                'food_id'=> $carts[$i]->food_id,
                'image'=> $carts[$i]->image,
                'name'=>$carts[$i]->name,
                'price'=>$carts[$i]->price,
                'quantity'=>$carts[$i]->quantity,
                'total'=> $carts[$i]->total
            ]);
        }

        if ($request->pay_method == 1) {
            return redirect()->route('transaction-user.index');
        } else {
            return redirect()->route('payment.index', $transaction->id);
        }
    }
}
