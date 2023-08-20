<?php

namespace App\Http\Controllers\Resto;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\KulinerPlace;
use App\Http\Requests\Admin\FoodRequest;
use Illuminate\Support\Facades\Auth;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resto_id = Auth::user()->id;
        $kuliner_place = KulinerPlace::where('resto_id',$resto_id)->get()->first();
        $items = Food::where('place_id', $kuliner_place->id)->get();
        return view('pages.resto.food.index',[
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
        $resto_id = Auth::user()->id;
        $kuliner_place = KulinerPlace::where('resto_id',$resto_id)->get()->first();
        return view('pages.resto.food.create',[
            'resto_id'=>$kuliner_place->id
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FoodRequest $request)
    {
        $data = $request->all();
        $data['image'] = $request->file('image')->store(
            'assets/food', 'public'
        );
        Food::create($data);
        return redirect()->route('food.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Food::findOrFail($id);
        return view('pages.resto.food.edit',[
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
    public function update(FoodRequest $request, $id)
    {
        $data = $request->all();
        $data['image'] = $request->file('image')->store(
            'assets/food', 'public'
        );
        $item = Food::findOrFail($id);

        $item->update($data);

        return redirect()->route('food.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Food::findOrFail($id);
        $item -> delete();
        return redirect()->route('food.index');
    }
}
