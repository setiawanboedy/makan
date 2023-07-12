@extends('layouts.detail')
@section('title', 'Makan - Detail')
@section('content')
    <!-- Header Start -->
    <div class="container header bg-white pt-lg-5 pt-md-5">
        <div class="row g-0 flex-column-reverse flex-md-row">
            <div class="col-md-0 pt-5 mt-lg-5">
                <nav aria-label="breadcrumb animated fadeIn">
                    <ol class="breadcrumb text-uppercase">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item text-body active" aria-current="page">
                            {{ $item->name }}
                        </li>
                    </ol>
                </nav>
                <h3 class="animated fadeIn">{{ $item->name }}</h3>
            </div>
        </div>
    </div>
    <!-- Header End -->
    <section class="container">
        <div class="row g-0 gx-5 flex-column-reverse flex-md-row">
            <div class="col-md-6">
                <div class="btn bg-warning rounded-pill text-white px-lg-3 py-1">
                    <span class="fa fa-book px-lg-1"></span> {{ $number->paket }}
                </div>

                <ul class="nav nav-pills d-inline-flex justify-content-start mt-3">

                    <li class="nav-item me-2">
                        <div class="nav-item">
                            {{-- <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Jam buka</a> --}}

                        </div>
                    </li>

                </ul>
            </div>
            <div class="col-md-5 d-flex justify-content-end">
                <div class="number-box text-center">Nomor <br> {{ $number->nomer }}</div>
            </div>
        </div>

    </section>
    <!-- Property List Start -->
    <div class="container-xxl py-5 mt-3">
        <div class="container">
            <div class="row g-0 gx-5 align-items-end">
                <div class="col-lg-6">
                    <div class="text-start mx-auto mb-5 wow slideInLeft" data-wow-delay="0.1s">
                        <h4 class="mb-3">Makanannya dulu donk!</h4>
                    </div>
                </div>
            </div>
            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade show p-0 active">
                    <div class="row row-cols-1 row-cols-md-4 g-4">
                        @forelse ($item->food as $product)
                            <div class="col ">
                                <div class="card h-100">
                                    <img src="{{ Storage::url($product->image) }}" class="card-img-top p-3" alt="image">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $product->name }}</h5>
                                        <p class="card-text h6 py-md-2">Rp {{ $product->price }}</p>
                                    </div>

                                    <form action="{{route('food.add')}}" method="post">
                                        @csrf

                                        <div class="text-center pb-md-3 d-grid px-md-3 add ">
                                            <input type="hidden" name="food_id" value="{{$product->id}}">
                                            <input type="hidden" name="place_id" value="{{$item->id}}">
                                            <input type="hidden" name="nomer" value="{{$number->nomer}}">
                                            <input type="hidden" name="nomer_id" value="{{$number->id}}">
                                            <input type="hidden" name="name" value="{{$product->name}}">
                                            <input type="hidden" name="price" value="{{$product->price}}">
                                            <input type="hidden" name="image" value="{{$product->image}}">
                                            <input type="hidden" name="quantity" value="1">
                                            <button class="btn btn-outline-primary">Tambah</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        @empty
                            <div class="text-lg-center">
                                <h5>Tidak ada produk makanan</h5>
                            </div>
                        @endforelse

                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <!-- Property List End -->
    <div style="position: sticky; bottom: 0;" class="bg-white pay-book">
        <nav class="container bg-white navbar-light py-3 px-4 text-center d-grid">
            <a href="#" class="btn btn-danger py-2 rounded-3" style="color: white;">Lanjutkan Pemesanan</a>

        </nav>
    </div> --}}
@endsection
