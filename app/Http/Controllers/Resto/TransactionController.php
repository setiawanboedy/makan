<?php

namespace App\Http\Controllers\Resto;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\KulinerPlace;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Auth::user()->id;
        $restoId = KulinerPlace::where('resto_id', $userId)->first()->id;
        // $items = Transaction::with(['user'])->get();
        // $transactions = Transaction::whereHas('trans_details', function ($query) use ($restoId) {
        //     $query->where('resto_id', $restoId);
        // })->get();

        // dd($transactions);
        $transactions = TransactionDetail::where('resto_id', $restoId)->get();

        return view('pages.resto.transaction.index',[
            // 'items'=>$items
            'transactions'=>$transactions
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        TransactionDetail::create($data);

        return redirect()->route('transaction.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Transaction::findOrFail($id);

        return view('pages.resto.transaction.detail',[
            'item' => $item
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = TransactionDetail::findOrFail($id);

        return view('pages.resto.transaction.edit',[
            'item'=>$item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $item = TransactionDetail::findOrFail($id);

        $item->update($data);

        return redirect()->route('transaction.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = TransactionDetail::findOrFail($id);
        $item -> delete();
        return redirect()->route('transaction.index');
    }
}
