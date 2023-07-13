<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KulinerPlace;
use App\Models\BookingNumber;
use App\Models\User;
use App\Http\Requests\Admin\KulinerRequest;

class KulinerPlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = KulinerPlace::get();
        return view('pages.admin.kuliner.index', [
            'items'=>$items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $restos = User::where('roles','RESTO')->get();
        return view('pages.admin.kuliner.create',[
            'restos'=>$restos
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KulinerRequest $request)
    {
        $data = $request->all();
        $data['image'] = $request->file('image')->store(
            'assets/gallery', 'public'
        );
        KulinerPlace::create($data);

        return redirect()->route('kuliner-place.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = KulinerPlace::findOrFail($id);
        $restos = User::where('roles','RESTO')->get();
        return view('pages.admin.kuliner.edit',[
            'item'=>$item,
            'restos'=>$restos
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

        $data['image'] = $request->file('image')->store(
            'assets/gallery', 'public'
        );


        $item = KulinerPlace::findOrFail($id);

        $item->update($data);

        return redirect()->route('kuliner-place.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = KulinerPlace::findOrFail($id);

        $book_numbers = BookingNumber::whereIn('booking_numbers_id', [$item->id]);
        // dd($book_numbers->count());
        $book_numbers->delete();
        $item -> delete();

        return redirect()->route('kuliner-place.index');
    }
}
