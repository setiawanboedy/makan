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
                        <div class="col ">
                          <div class="card h-100">
                            <img src="https://i.gojekapi.com/darkroom/gofood-indonesia/v2/images/uploads/7821bedf-cd0f-4c47-872b-fb46d5acf1fb_da0e51f7-e9f8-43f4-9233-7d76ee66c727_Go-Biz_20190801_173813.jpeg?auto=format" class="card-img-top p-3" alt="image">
                            <div class="card-body">
                              <h5 class="card-title">Paket Hemat Big Mac, Large GRATIS McFlurry feat. OREO</h5>
                              <p class="card-text h6 py-md-2">Rp 20.000</p>
                            </div>
                            <div class="text-center pb-md-3 d-grid px-md-3 add">
                                <a href="#" class="btn btn-outline-primary">Tambah</a>
                            </div>
                          </div>
                        </div>
                        <div class="col">
                            <div class="card h-100">
                              <img src="https://i.gojekapi.com/darkroom/gofood-indonesia/v2/images/uploads/fccf6f3d-8daa-4409-a629-c08bd31f7dca_c9867d28-bc96-4190-b87e-d822837e5ccc_Go-Biz_20190730_215640.jpeg?auto=format" class="card-img-top p-3 product-img" alt="...">
                              <div class="card-body">
                                <h5 class="card-title">Paket Hemat Big Mac, Large GRATIS McFlurry feat. OREO</h5>
                                <p class="card-text h6 py-md-2">Rp 20.000</p>
                              </div>
                              <div class="text-center pb-md-3 d-grid px-md-3 add">
                                  <a href="#" class="btn btn-outline-primary">Tambah</a>
                              </div>
                            </div>
                          </div>
                          <div class="col">
                            <div class="card h-100">
                              <img src="https://i.gojekapi.com/darkroom/gofood-indonesia/v2/images/uploads/7d252beb-b8cb-46e2-8a26-e43e75379ab6_TPO-110068_3.jpg" class="card-img-top p-3" alt="...">
                              <div class="card-body">
                                <h5 class="card-title">Paket Hemat Big Mac, Large GRATIS McFlurry feat. OREO</h5>
                                <p class="card-text h6 py-md-2">Rp 20.000</p>
                              </div>
                              <div class="text-center pb-md-3 d-grid px-md-3 add">
                                  <a href="#" class="btn btn-outline-primary">Tambah</a>
                              </div>
                            </div>
                          </div>
                          <div class="col">
                            <div class="card h-100">
                              <img src="https://i.gojekapi.com/darkroom/gofood-indonesia/v2/images/uploads/7d252beb-b8cb-46e2-8a26-e43e75379ab6_TPO-110068_3.jpg" class="card-img-top p-3" alt="...">
                              <div class="card-body">
                                <h5 class="card-title">Paket Hemat Big Mac, Large GRATIS McFlurry feat. OREO</h5>
                                <p class="card-text h6 py-md-2">Rp 20.000</p>
                              </div>
                              <div class="text-center pb-md-3 d-grid px-md-3 add">
                                  <a href="#" class="btn btn-outline-primary">Tambah</a>
                              </div>
                            </div>
                          </div>
                          <div class="col">
                            <div class="card h-100">
                              <img src="https://i.gojekapi.com/darkroom/gofood-indonesia/v2/images/uploads/7d252beb-b8cb-46e2-8a26-e43e75379ab6_TPO-110068_3.jpg" class="card-img-top p-3" alt="...">
                              <div class="card-body">
                                <h5 class="card-title">Paket Hemat Big Mac, Large GRATIS McFlurry feat. OREO</h5>
                                <p class="card-text h6 py-md-2">Rp 20.000</p>
                              </div>
                              <div class="text-center pb-md-3 d-grid px-md-3 add">
                                  <a href="#" class="btn btn-outline-primary">Tambah</a>
                              </div>
                            </div>
                          </div>
                      </div>
                </div>
            </div>
        </div>
    </div>

@endsection
