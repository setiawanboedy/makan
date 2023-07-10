@extends('layouts.detail')
@section('title', 'Makan - Detail')
@section('content')
    <!-- Header Start -->
    <div class="container header bg-white pt-lg-5">
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
                    <span class="fa fa-book px-lg-1"></span> Super
                    Partner
                </div>

                <ul class="nav nav-pills d-inline-flex justify-content-start mt-3">
                    <li class="nav-item me-2">
                        <div class="btn bg-primary rounded-pill text-white px-3 py-1">
                            <span class="fa fa-dot-circle pe-1"></span>{{ $item->status }}
                        </div>
                    </li>
                    <li class="nav-item me-2">
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Jam buka</a>
                            <div class="dropdown-menu rounded-3 m-0">
                                <p class="dropdown-item">Senin
                                    10:00-21:30</p>
                                <p class="dropdown-item">Selasa
                                    10:00-21:30</p>
                                <p class="dropdown-item">Rabu
                                    10:00-21:30</p>
                                <p class="dropdown-item">Kamis
                                    10:00-21:30</p>
                                <p class="dropdown-item">Jumat
                                    10:00-21:30</p>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item pt-lg-2">
                        <p>{{ $item->address }}</p>
                    </li>
                </ul>
            </div>
            <div class="col-md-5 d-flex justify-content-end">
                <img class="img-fluid rounded-3 img-thumbnail img-detail" src="{{ Storage::url($item->image) }}"
                    alt="Image" width="430" style="height: max-height: 500px" />
            </div>
        </div>
        <div class="col-md-6 dest-rating py-lg-3">
            <ul class="nav nav-pills d-inline-flex justify-content-start mb-5 mt-3">
                <li class="nav-item me-2">
                    <div class="row text-center">
                        <div class="col-7">
                            <span class="fa fa-star" style="color: orange"></span> 4.5
                        </div>
                        <div class="col-lg-8">400 Ratings</div>
                    </div>
                </li>
                <li class="nav-item me-2">
                    <div class="row text-center">
                        <div class="col-7">$$$$</div>
                        <div class="col-lg-8">{{ $item->avgprice }}</div>
                    </div>
                </li>
            </ul>
        </div>
    </section>

    <!-- Property List Start -->
    <div class="container-xxl py-5 mt-3">
        <div class="container">
            <div class="row g-0 gx-5 align-items-end">
                <div class="col-lg-6">
                    <div class="text-start mx-auto mb-5 wow slideInLeft" data-wow-delay="0.1s">
                        <h4 class="mb-3">Booking tempat dulu yuk!</h4>
                    </div>
                </div>
            </div>
            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade show p-0 active">
                    <div class="row g-4">
                        @forelse ($item->booking_numbers as $number)
                            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="property-item rounded overflow-hidden">
                                    <ul class="nav nav-pills d-flex justify-content-between">
                                        <li class="nav-item">
                                            <div class="rounded-circle bg-primary text-center m-2"
                                                style="color: white; width: 25px;">+</div>
                                        </li>
                                        <li class="nav-item ">
                                            <p class="p-2 btn-primary btn-block text-white">Siap</p>
                                        </li>
                                    </ul>

                                    <div class="pb-0 text-center">
                                        <a class="d-block h3 mb-2">Nomor</a>
                                        <a class="d-block h3 mb-2">{{ $number->nomer }}</a>
                                        <p>
                                            <i class="fa fa-bookmark text-primary me-2"></i>{{ $number->paket }}
                                        </p>
                                    </div>
                                    <div class="d-grid border-top">
                                        <a href="{{ route('book-confirm', $number->id) }}"
                                            class="btn btn-primary btn-block">Booking</a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="text-lg-center">
                                <h5>Tidak ada tempat makan</h5>
                            </div>
                        @endforelse

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Property List End -->
    {{-- <div style="position: sticky; bottom: 0; display: none;" class="bg-white pay-book">
        <nav class="container bg-white navbar-light py-3 px-4 text-center d-grid">
            <a href="{{route('book-confirm')}}" class="btn btn-danger py-2 rounded-3" style="color: white;">Lanjutkan Pemesanan</a>

        </nav>
    </div> --}}
@endsection
