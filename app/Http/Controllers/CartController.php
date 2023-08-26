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
        $cartItems = Cart::where('user_id',$userId)->get();

        $foods = collect($cartItems);

        $subtotal = $foods->sum('total');
        $pajak = ($subtotal*10)/100;
        $total = $subtotal+$pajak;
        return view('pages.cart', [
            'cartItems'=>$cartItems,
            'total'=> $total,
            'pajak'=>$pajak
        ]);
    }

    public function updateNomerTable(Request $request){
        $cart = Cart::findOrFail($request->cart_id);
        $cart->nomer = $request->nomer;
        $cart->save();
        return redirect()->route('cart.list');
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

        $carts = Cart::where('user_id', $userId)->get();
        for ($i=0; $i < count($carts); $i++) {

            TransactionDetail::create([
                'transaction_id'=> $transaction->id,
                'resto_id'=> $carts[$i]->resto_id,
                'food_id'=> $carts[$i]->food_id,
                'image'=> $carts[$i]->image,
                'name'=>$carts[$i]->name,
                'nomer'=> $carts[$i]->nomer,
                'price'=>$carts[$i]->price,
                'quantity'=>$carts[$i]->quantity,
                'total'=> $carts[$i]->total
            ]);
        }
            Cart::truncate();
            return redirect()->route('payment.index', $transaction->id);

    }
}
