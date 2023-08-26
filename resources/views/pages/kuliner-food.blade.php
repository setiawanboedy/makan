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
                <ul class="nav nav-pills d-inline-flex justify-content-start mb-5 mt-3">
                    <li class="nav-item me-2">
                        <div class="row text-center">
                            <div class="col-7">
                                <span class="fa fa-star" style="color: orange"></span> {{$rating}}
                            </div>
                            <div class="col-lg-8">{{count($testimonis)}} Ratings</div>
                        </div>
                    </li>
                    <li class="nav-item me-2">
                        <div class="row text-center">
                            <div class="col-7">Rp</div>
                            <div class="col-lg-8">{{ $item->avgprice }}</div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-md-5 d-flex justify-content-end">
                <img class="img-fluid rounded-3 img-thumbnail img-detail" src="{{ Storage::url($item->image) }}"
                    alt="Image" width="430" />
            </div>
        </div>

    </section>
    <!-- Property List Start -->
    <div class="container-xxl py-5 mt-3" style="bottom: -150vh">
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

                                    <form action="{{ route('food.add') }}" method="post">
                                        @csrf

                                        <div class="text-center pb-md-3 d-grid px-md-3 add ">
                                            <input type="hidden" name="food_id" value="{{ $product->id }}">
                                            <input type="hidden" name="resto_id" value="{{ $item->id }}">
                                            <input type="hidden" name="table" value="{{ $item->table }}">
                                            {{-- <input type="hidden" name="nomer_id" value="{{$number->id}}"> --}}
                                            <input type="hidden" name="name" value="{{ $product->name }}">
                                            <input type="hidden" name="price" value="{{ $product->price }}">
                                            <input type="hidden" name="image" value="{{ $product->image }}">
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



            <!-- Testimonial Start -->
            <div class="container-xxl py-5 mt-4" @if (count($testimonis) <= 1) style="width: 50%" @endif>
                <div class="container">
                    <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                        <h1 class="mb-3">Testimoni</h1>
                        <p>Beberapa testimoni bagi yang sudah menggunakan layanan kami.</p>
                    </div>

                    @if (count($testimonis) <= 1)
                        @foreach ($testimonis as $testi)
                            <div class="testimonial-item bg-light rounded p-3">
                                <div class="bg-white border rounded p-4">
                                    <p>{{ $testi->message }}</p>
                                    <div class="d-flex align-items-center">
                                        <img class="img-fluid flex-shrink-0 rounded"
                                            src="https://ui-avatars.com/api/?name={{ $testi->user->name }}"
                                            style="width: 45px; height: 45px;">
                                        <div class="ps-3">
                                            <h6 class="fw-bold mb-1">{{ $testi->user->name }}</h6>
                                            <small><span class="fa fa-star" style="color: orange"></span>
                                                {{ $testi->rating }}</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">

                            @foreach ($testimonis as $testi)
                                <div class="testimonial-item bg-light rounded p-3">
                                    <div class="bg-white border rounded p-4">
                                        <p>{{ $testi->message }}</p>
                                        <div class="d-flex align-items-center">
                                            <img class="img-fluid flex-shrink-0 rounded"
                                                src="https://ui-avatars.com/api/?name={{ $testi->user->name }}"
                                                style="width: 45px; height: 45px;">
                                            <div class="ps-3">
                                                <h6 class="fw-bold mb-1">{{ $testi->user->name }}</h6>
                                                <small><span class="fa fa-star" style="color: orange"></span>
                                                    {{ $testi->rating }}</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif

                </div>
            </div>
            <!-- Wrapper container -->
            <div class="container py-4" style="width: 50%">

                <!-- Bootstrap 5 starter form -->
                <form id="contactForm" action="{{ route('food.testimoni') }}" method="POST">
                    @csrf
                    <input type="hidden" name="place_id" value="{{ $item->id }}">

                    <!-- Email address input -->
                    <div class="mb-3">
                        <label class="form-label" for="emailAddress">Berikan Rating</label>
                        <select name="rating" class="form-select" aria-label="Default select example">
                            <option value="1" selected>1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>

                    <!-- Message input -->
                    <div class="mb-3">
                        <label class="form-label" for="message">Pesan</label>
                        <textarea name="message" class="form-control" id="message" type="text" placeholder="Feedback"
                            style="height: 10rem;"></textarea>
                    </div>

                    <!-- Form submit button -->
                    <div class="d-grid">
                        <button class="btn btn-primary btn-lg" type="submit">Kirim</button>
                    </div>

                </form>

            </div>
            <!-- Testimonial End -->
        </div>
    </div>
@endsection
