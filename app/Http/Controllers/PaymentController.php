<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;

class PaymentController extends Controller
{

    public function upload(Request $request)
    {
        $request->validate([
            'prove'=> 'required|image'
        ]);
        $data = $request->all();
        $userId = Auth::user()->id;
        $trans = Transaction::findOrFail($trans_id);

        $img = Image::make($request->file('prove'));
        $img->greyscale()->save('storage/assets/prove/'.Str::random(20).'.jpg');
        $trans->prove = $img->dirname.'/'.$img->basename;
        $trans->save();

        return redirect()->route('user-trans.index');
    }
}
