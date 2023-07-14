<?php

namespace App\Http\Controllers\Resto;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use PDF;

class DashboardController extends Controller
{
    public function index(Request $request){

        $restoId = Auth::user()->id;

        $transactions = Transaction::whereHas('detailHeaders', function ($query) use ($restoId) {
            $query->where('resto_id', $restoId);
        })->get();


        $trans_count = $transactions->count();
        $trans_success_count = $transactions->where('transaction_status','SUCCESS')->count();
        $trans_pending_count = $transactions->where('transaction_status','PENDING')->count();
        return view('pages.resto.dashboard',[
            'trans_count'=>$trans_count,
            'trans_success_count'=>$trans_success_count,
            'trans_pending_count'=>$trans_pending_count,
            'items'=>$transactions
        ]);
    }

    public function pdf(Request $request)
    {
        $restoId = Auth::user()->id;

        $transactions = Transaction::whereHas('detailHeaders', function ($query) use ($restoId) {
            $query->where('resto_id', $restoId);
        })->get();

        $pdf = PDF::loadview('pages.resto.pdf',['items'=>$transactions]);
        return $pdf->download('laporan-transaksi.pdf');
    }
}
