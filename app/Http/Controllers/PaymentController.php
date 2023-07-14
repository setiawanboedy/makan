<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    public function index($transactionId){
        return view('pages.payment-confirm', [
            'trans_id'=>$transactionId
        ]);
    }

    public function upload(Request $request)
    {
        $request->validate([
            'prove'=> 'required|image'
        ]);
        $data = $request->all();
        $userId = Auth::user()->id;
        $trans = Transaction::findOrFail($request->trans_id);

        $img = Image::make($request->file('prove'));
        $img->greyscale()->save('storage/assets/prove/'.Str::random(20).'.jpg');
        $trans->prove = $img->dirname.'/'.$img->basename;
        $trans->save();

        return redirect()->route('transaction-user');
    }
}
