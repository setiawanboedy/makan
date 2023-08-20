<?php

namespace App\Http\Controllers\Resto;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\KulinerPlace;
use Illuminate\Support\Facades\Auth;
use PDF;

class DashboardController extends Controller
{
    public function index(){

        $resto = Auth::user();
        $kuliner_place = KulinerPlace::where('resto_id',$resto->id)->get()->first();
        $items = Food::where('place_id', $kuliner_place->id)->count();

        return view('pages.resto.dashboard',[
            'items'=>$items,
            'owner'=>$resto,
            'kuliner_place'=>$kuliner_place
        ]);
    }

    // public function pdf(Request $request)
    // {
    //     $restoId = Auth::user()->id;

    //     $transactions = Transaction::whereHas('detailHeaders', function ($query) use ($restoId) {
    //         $query->where('resto_id', $restoId);
    //     })->get();

    //     $pdf = PDF::loadview('pages.resto.pdf',['items'=>$transactions]);
    //     return $pdf->download('laporan-transaksi.pdf');
    // }

    public function edit($id){
        $kuliner_place = KulinerPlace::findOrFail($id);
        // dd($id);
        return view('pages.resto.edit',[
            'item'=>$kuliner_place
        ]);
    }

	public function update(Request $request){

        $item = KulinerPlace::findOrFail($request->resto_id);
		$item->name = $request->name;
        $item->status = $request->status;
        $item->save();

        return redirect()->route('dashboard-resto');
	}
}
