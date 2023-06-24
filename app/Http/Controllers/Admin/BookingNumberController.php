<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BookingNumber;
use App\Models\KulinerPlace;
use App\Http\Requests\Admin\BookingNumberRequest;

class BookingNumberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = BookingNumber::with(['kuliner_place'])->get();
        return view('pages.admin.booking-number.index',[
            'items'=> $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kuliner_places = KulinerPlace::all();

        return view('pages.admin.booking-number.create',[
            'kuliner_places'=> $kuliner_places
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookingNumberRequest $request)
    {
        $data = $request->all();
        BookingNumber::create($data);

        return redirect()->route('booking-number.index');
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
        $item = BookingNumber::with(['kuliner_place'])->findOrFail($id);
        return view('pages.admin.booking-number.edit',[
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
    public function update(BookingNumberRequest $request, $id)
    {
        $data = $request->all();

        $item = BookingNumber::findOrFail($id);

        $item->update($data);

        return redirect()->route('booking-number.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = BookingNumber::findOrFail($id);
        $item -> delete();
        return redirect()->route('booking-number.index');
    }
}
