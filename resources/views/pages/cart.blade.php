@extends('layouts.detail')

@section('title')
    Keranjang - Kekalik Mebel
@endsection

@section('content')
    <section class="h-100 h-custom">
        <div class="container py-5 ">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <div class="">
                        <div class="">
                            <div class="row">
                                <div class="col-lg-7">
                                    <h5 class="mb-3"><a href="#!" class="text-body">Daftar Pesanan</a></h5>
                                    <hr>
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            @forelse ($cartHeaders as $header)
                                            <div class="">
                                                <h5>{{$header->place->name}}</h5>
                                                <p>Meja Nomor {{$header->nomer}}</p>
                                            </div>
                                            @foreach ($header->carts as $item)
                                            <div class="d-flex justify-content-between">
                                                <div class="d-flex flex-row align-items-center">
                                                    <div>
                                                        <img src="{{Storage::url($item->image)}}"
                                                            class="img-fluid rounded-3" alt="Shopping item"
                                                            style="width: 65px;">
                                                    </div>
                                                    <div class="ms-3">
                                                        <h5>{{$item->name}}</h5>
                                                        <p class="small mb-0">Rp {{$item->price}}</p>
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-row align-items-center btn-focus">
                                                    <form action="{{route('cart.update')}}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="food_id" value="{{$item->food_id}}">
                                                        <input type="hidden" name="place_id" value="{{$header->place->id}}">
                                                        <input type="hidden" name="nomer" value="{{$header->nomer}}">
                                                        <input type="hidden" name="name" value="{{$item->name}}">
                                                        <input type="hidden" name="price" value="{{$item->price}}">
                                                        <input type="hidden" name="image" value="{{$item->image}}">
                                                        <input type="hidden" name="header_id" value="{{$header->id}}">

                                                        <button class="btn btn-link px-2"
                                                            onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                                            <i class="fas fa-minus"></i>
                                                        </button>

                                                        <input id="form1" min="0" name="quantity" value="{{$item->quantity}}"
                                                            type="number" class="form-control form-control-sm"
                                                            style="width: 50px;" />

                                                        <button class="btn btn-link px-2 pe-5"
                                                            onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                                            <i class="fas fa-plus"></i>
                                                        </button>
                                                    </form>
                                                    <div style="width: 80px;">
                                                        <h5 class="mb-0">Rp {{$item->total}}</h5>
                                                    </div>
                                                    <a href="#!" style="color: #cecece;"><i
                                                            class="fas fa-trash-alt"></i></a>
                                                </div>
                                            </div>
                                            <hr>
                                            @endforeach
                                            @empty
                                                <h6 class="text-center p-4">Keranjang kosong</h6>
                                            @endforelse

                                        </div>
                                    </div>



                                </div>
                                <div class="col-lg-5">

                                    <div class="card bg-primary text-white rounded-3">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between align-items-center mb-4">
                                                <h5 class="mb-0 text-white">Rekap Pesanan</h5>
                                            </div>

                                            <p class="small mb-2">Bayar di</p>
                                            <a href="#!" type="submit" class="text-white"><i
                                                    class="fab fa-cc-mastercard fa-2x me-2"></i></a>
                                            <a href="#!" type="submit" class="text-white"><i
                                                    class="fab fa-cc-visa fa-2x me-2"></i></a>
                                            <a href="#!" type="submit" class="text-white"><i
                                                    class="fab fa-cc-amex fa-2x me-2"></i></a>
                                            <a href="#!" type="submit" class="text-white"><i
                                                    class="fab fa-cc-paypal fa-2x"></i></a>

                                            <form class="mt-4">
                                                <div class="form-outline form-white mb-4">
                                                    <input type="date" id="typeName"
                                                        class="form-control form-control-lg" siez="17"
                                                         />
                                                    <label class="form-label" for="typeName">Tanggal</label>
                                                </div>

                                                <div class="form-outline form-white mb-4">
                                                    <input type="text" id="typeText"
                                                        class="form-control form-control-lg" siez="17"
                                                        placeholder="Jam 12 siang" minlength="19"
                                                        maxlength="19" />
                                                    <label class="form-label" for="typeText">Waktu</label>
                                                </div>

                                            </form>

                                            <hr class="my-4">

                                            <div class="d-flex justify-content-between">
                                                <p class="mb-2">Pajak (10%)</p>
                                                <p class="mb-2">Rp {{$pajak}}</p>
                                            </div>

                                            <div class="d-flex justify-content-between mb-4">
                                                <p class="mb-2">Total</p>
                                                <p class="mb-2">Rp {{$total}}</p>
                                            </div>

                                            <button type="button" class="btn btn-block btn-lg" style="background-color: #717FE0">
                                                <div class="d-flex justify-content-between">

                                                    <span class="text-white">Checkout <i class="fas fa-long-arrow-alt-right ms-2"></i></span>
                                                </div>
                                            </button>

                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection