@extends('layouts.app')

@section('title')
    Makan - Wisata Kuliner
@endsection

@section('content')
    <!-- Header Start -->
    <div class="container header bg-white p-0 mt-4 mb-lg-5">
        <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
            <div class="col-md-6 p-5 mt-lg-5">
                <h1 class="display-5 animated fadeIn mb-4">Temukan <span class="text-primary">Tempat Makan</span> yang Nyaman
                    dan Enak</h1>
                <p class="animated fadeIn mb-4 pb-2">Booking tempat makan yang nyaman langsung di sini. Tidak perlu khawatir
                    kehabisan tempat dan banyak pilihan restonya.</p>
                <a href="#kuliner" class="btn btn-primary py-3 px-5 me-3 animated fadeIn">Pilih Tempat</a>
            </div>
            <div class="col-md-6 animated fadeIn">
                <div class="owl-carousel header-carousel">
                    <div class="owl-carousel-item">
                        <img class="img-fluid"
                            src="https://jnewsonline.com/wp-content/uploads/2021/06/144824588_451595515972683_1578488716308310779_n-1024x1024.jpg"
                            alt="">
                    </div>
                    <div class="owl-carousel-item">
                        <img class="img-fluid"
                            src="https://indonesia.tripcanvas.co/id/wp-content/uploads/sites/2/2020/06/3-1-outdoor-via-jojothen.jpg"
                            alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <div class=" container testimonial-item bg-light rounded mb-5" style="max-width: 700px; padding: 15px;">
        <div class="container card border-0 shadow wow fadeIn" data-wow-delay="0.1s" style="padding: 15px; ">
            <div class="container card-body">
                <div class="card-title">Lokasi anda</div>
                <div class="row g-2">
                    <div class="col-md-9">
                        <div class="row g-2">
                            <div class="col-md-10">
                                <input type="hidden" id="use-location-bias" value="" checked />
                                <input type="hidden" id="lat"/>
                                <input type="hidden" id="lng"/>
                                <input id="pac-input" type="text"
                                    class="form-control py-3 rounded-pill border-1 border-dark"
                                    placeholder="Lokasi resto terdekat">

                            </div>

                        </div>
                    </div>
                    <div class="col-md-3">
                        <button id="searchBtn" class="btn btn-primary border-0 rounded-pill w-100 py-3">Cari</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Category Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="mb-3">Kategori Makanan</h1>
                <p>Pilih jenis makanan yang kamu suka. </p>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <a class="cat-item d-block bg-light text-center rounded p-3" href="">
                        <div class="rounded p-4">
                            <div class="icon mb-3">
                                <img class="img-fluid rounded-3"
                                    src="https://i.gojekapi.com/darkroom/gofood-indonesia/v2/images/uploads/93cd9871-814f-4121-94d9-96430c3111a4_tag-image_1608202898934.jpg?fit=crop&w=70&h=70&auto=format"
                                    alt="Icon">
                            </div>
                            <h6>Jajanan</h6>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                    <a class="cat-item d-block bg-light text-center rounded p-3" href="">
                        <div class="rounded p-4">
                            <div class="icon mb-3">
                                <img class="img-fluid"
                                    src="https://i.gojekapi.com/darkroom/gofood-indonesia/v2/images/uploads/92004beb-7acf-46f1-9e21-6b80bd10a8ae_tag-image_1608203017089.jpg?fit=crop&w=70&h=70&auto=format"
                                    alt="Icon">
                            </div>
                            <h6>Bakso & Soto</h6>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                    <a class="cat-item d-block bg-light text-center rounded p-3" href="">
                        <div class="rounded p-4">
                            <div class="icon mb-3">
                                <img class="img-fluid"
                                    src="https://i.gojekapi.com/darkroom/gofood-indonesia/v2/images/uploads/8e133f59-d50f-41b0-bfa7-1a61a074cc8b_tag-image_1608202870005.jpg?fit=crop&w=70&h=70&auto=format"
                                    alt="Icon">
                            </div>
                            <h6>Minuman</h6>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                    <a class="cat-item d-block bg-light text-center rounded p-3" href="">
                        <div class="rounded p-4">
                            <div class="icon mb-3">
                                <img class="img-fluid"
                                    src="https://i.gojekapi.com/darkroom/gofood-indonesia/v2/images/uploads/5e117b21-4c43-46e0-9b78-05f67960fb36_tag-image_1608203141910.jpg?fit=crop&w=70&h=70&auto=format"
                                    alt="Icon">
                            </div>
                            <h6>Seafood</h6>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <a class="cat-item d-block bg-light text-center rounded p-3" href="">
                        <div class="rounded p-4">
                            <div class="icon mb-3">
                                <img class="img-fluid"
                                    src="https://i.gojekapi.com/darkroom/gofood-indonesia/v2/images/uploads/7761a441-928a-487a-acd5-0df24f318c91_tag-image_1608202965341.jpg?fit=crop&w=70&h=70&auto=format"
                                    alt="Icon">
                            </div>
                            <h6>Cepat Saji</h6>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                    <a class="cat-item d-block bg-light text-center rounded p-3" href="">
                        <div class="rounded p-4">
                            <div class="icon mb-3">
                                <img class="img-fluid"
                                    src="https://i.gojekapi.com/darkroom/gofood-indonesia/v2/images/uploads/e709853b-1a90-4d64-90b4-1f547334685d_tag-image_1608203031931.jpg?fit=crop&w=70&h=70&auto=format"
                                    alt="Icon">
                            </div>
                            <h6>Bakmi</h6>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                    <a class="cat-item d-block bg-light text-center rounded p-3" href="">
                        <div class="rounded p-4">
                            <div class="icon mb-3">
                                <img class="img-fluid"
                                    src="https://i.gojekapi.com/darkroom/gofood-indonesia/v2/images/uploads/e59878b4-a46e-4cbb-a887-23df3e8b5eda_tag-image_1608203153518.jpg?fit=crop&w=70&h=70&auto=format"
                                    alt="Icon">
                            </div>
                            <h6>Timur Tengah</h6>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                    <a class="cat-item d-block bg-light text-center rounded p-3" href="">
                        <div class="rounded p-4">
                            <div class="icon mb-3">
                                <img class="img-fluid"
                                    src="https://i.gojekapi.com/darkroom/gofood-indonesia/v2/images/uploads/dbd649d7-fcd7-404f-91f3-537af629044f_tag-image_1608203186648.jpg?fit=crop&w=70&h=70&auto=format"
                                    alt="Icon">
                            </div>
                            <h6>Roti</h6>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Category End -->


    <!-- Property List Start -->
    <div class="container-xxl py-5" id="kuliner">
        <div class="container">
            <div class="row g-0 gx-5 align-items-end">
                <div class="col-lg-6">
                    <div class="text-start mx-auto mb-5 wow slideInLeft" data-wow-delay="0.1s">
                        <h1 class="mb-3">Mana nih tempat yang kamu suka?</h1>
                        <p>Yuk, dicek tempat makan populer, favoritnya foodies lokal, dan penawaran terbaik kami ada disini!
                        </p>
                    </div>
                </div>

            </div>
            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade show p-0 active">
                    <div class="row g-4">

                        @forelse ($items->take(6) as $item)
                            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                <a href="{{ route('kuliner-detail', $item->id) }}">
                                    <div class="property-item rounded overflow-hidden">
                                        <div class="position-relative overflow-hidden">
                                            <img class="img-fluid" src="{{ Storage::url($item->image) }}" alt="">
                                            <div
                                                class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                                                {{ $item->status }}</div>
                                            <div
                                                class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">
                                                <span class="fa fa-star" style="color: orange;"></span> 4.5
                                            </div>
                                        </div>
                                        <div class="p-4 pb-0">
                                            <a class="d-block h5 mb-2">{{ $item->name }}</a>
                                            <p><i class="fa fa-map-marker-alt text-primary me-2"></i>{{ $item->address }}
                                            </p>
                                        </div>
                                        <div class="d-flex border-top">
                                            <small class="flex-fill text-center border-end py-2"><i
                                                    class="fa fa-map-marked-alt text-primary me-2"></i>{{ $item->table }}
                                                Km</small>
                                            <small class="flex-fill text-center border-end py-2"><i
                                                    class="fa fa-table text-primary me-2"></i>{{ $item->table }}
                                                Meja</small>
                                            <small class="flex-fill text-center border-end py-2"><i
                                                    class="fa fa-home text-primary me-2"></i>{{ $item->room }}
                                                Ruangan</small>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @empty
                            <div class="text-lg-center">
                                <h5>Tidak ada tempat makan</h5>
                            </div>
                        @endforelse
                        <div class="col-12 d-flex justify-content-center text-center mt-lg-3 wow fadeInUp"
                            data-wow-delay="0.1s">
                            <a class="btn btn-primary py-3 px-5" href="{{ route('kuliner') }}">Tampilkan tempat
                                lainnya</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Property List End -->


    <!-- Testimonial Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="mb-3">Testimoni</h1>
                <p>Beberapa testimoni bagi yang sudah menggunakan layanan kami.</p>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                <div class="testimonial-item bg-light rounded p-3">
                    <div class="bg-white border rounded p-4">
                        <p>Tempor stet labore dolor clita stet diam amet ipsum dolor duo ipsum rebum stet dolor amet diam
                            stet. Est stet ea lorem amet est kasd kasd erat eos</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded" src="frontend/img/testimonial-1.jpg"
                                style="width: 45px; height: 45px;">
                            <div class="ps-3">
                                <h6 class="fw-bold mb-1">Client Name</h6>
                                <small>Profession</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item bg-light rounded p-3">
                    <div class="bg-white border rounded p-4">
                        <p>Tempor stet labore dolor clita stet diam amet ipsum dolor duo ipsum rebum stet dolor amet diam
                            stet. Est stet ea lorem amet est kasd kasd erat eos</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded" src="frontend/img/testimonial-2.jpg"
                                style="width: 45px; height: 45px;">
                            <div class="ps-3">
                                <h6 class="fw-bold mb-1">Client Name</h6>
                                <small>Profession</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item bg-light rounded p-3">
                    <div class="bg-white border rounded p-4">
                        <p>Tempor stet labore dolor clita stet diam amet ipsum dolor duo ipsum rebum stet dolor amet diam
                            stet. Est stet ea lorem amet est kasd kasd erat eos</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded" src="frontend/img/testimonial-3.jpg"
                                style="width: 45px; height: 45px;">
                            <div class="ps-3">
                                <h6 class="fw-bold mb-1">Client Name</h6>
                                <small>Profession</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->
@endsection
@push('addon-script')
    <script
        src="https://maps.googleapis.com/maps/api/js?key={{ config('maps.api_key') }}&callback=initMap&libraries=places&v=weekly"
        defer></script>
    <script>
        function initMap() {

            const input = document.getElementById("pac-input");
            const searchBtn = document.getElementById("searchBtn");
            const biasInputElement = document.getElementById("use-location-bias");
            const lat = document.getElementById("lat");
            const lng = document.getElementById("lng");

            const options = {
                fields: ["formatted_address", "geometry", "name"],
                strictBounds: false,
                types: ["establishment"],
            };

            const autocomplete = new google.maps.places.Autocomplete(input, options);


            autocomplete.addListener("place_changed", () => {

                const place = autocomplete.getPlace();

                if (!place.geometry || !place.geometry.location) {
                    window.alert("No details available for input: '" + place.name + "'");
                    return;
                }

                lat.value = place.geometry.location.lat();
                lng.value = place.geometry.location.lng();
                console.log("text search: "+ place.geometry.location.lat());
            });

            searchBtn.addEventListener("click", () => {
                if (input.value == '') {
                    getCurrentLocation();
                } else {

                    console.log("click search: "+lat.value);
                }

            })

            getCurrentLocation();

        }

        function getCurrentLocation(){
            const lat = document.getElementById("lat");
            const lng = document.getElementById("lng");
            if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(
                        (position) => {
                            const pos = {
                                lat: position.coords.latitude,
                                lng: position.coords.longitude,
                            };

                            lat.value = pos.lat;
                            lat.value = pos.lng;
                            console.log("current: "+ pos.lat);
                        },
                        (e) => {
                            console.log("error: "+e);
                        },{
                            enableHighAccuracy: true,
                            timeout:5000,
                        }
                    );
                }
        }

        window.initMap = initMap;
    </script>
@endpush
