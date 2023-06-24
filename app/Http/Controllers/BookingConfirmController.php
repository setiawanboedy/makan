<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookingNumber;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class BookingConfirmController extends Controller
{
    public function index(Request $request, $id)
    {
        $item = BookingNumber::with(['kuliner_place'])->findOrFail($id);
        return view('pages.book-confirm', [
            'item'=>$item
        ]);
    }

    public function submit(Request $request, $id)
    {
        $request->validate([
            'date'=>'required|date',
            'time'=>'required|string'
        ]);
        $data = $request->all();
        $book = BookingNumber::with(['kuliner_place'])->findOrFail($id);

        $trans_total = 20000;
        Transaction::create([
            'booking_numbers_id'=>$book->id,
            'users_id' => Auth::user()->id,
            'kuliner_places_id'=> $book->kuliner_place->id,
            'date'=>$data['date'],
            'time'=>$data['time'],
            'transaction_total'=>$trans_total,
            'transaction_status'=>'PENDING'
        ]);


        return redirect()->route('kuliner');


    }
}
