@extends('layouts.detail')
@section('title', 'Buka Resto')
@section('content')
    <!-- Begin Page Content -->
    <div class="container">


        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <section class="vh-100">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-75 mt-lg-5">
                    <div class="col-xl-9">

                        <h1 class=" mb-4">Buka resto</h1>

                        <form action="{{ route('open.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card" style="border-radius: 15px;">
                                <div class="card-body">

                                    <div class="row align-items-center pt-4 pb-3 form-group">
                                        <div class="col-md-3 ps-5">

                                            <h6 class="mb-0">Nama Resto</h6>

                                        </div>
                                        <div class="col-md-9 pe-5">

                                            <input type="text" name="name" class="form-control form-control-lg"
                                                placeholder="Resto" />

                                        </div>
                                    </div>

                                    {{-- <hr class="mx-n3"> --}}

                                    <div class="row align-items-center py-3 form-group">
                                        <div class="col-md-3 ps-5">

                                            <h6 class="mb-0">Harga rata-rata</h6>

                                        </div>
                                        <div class="col-md-9 pe-5">

                                            <input type="text" name="avgprice" class="form-control form-control-lg"
                                                placeholder="10rb-15rb" />

                                        </div>
                                    </div>

                                    {{-- <hr class="mx-n3"> --}}

                                    <div class="row align-items-center py-3 form-group">
                                        <div class="col-md-3 ps-5">

                                            <h6 class="mb-0">Jumlah meja</h6>

                                        </div>
                                        <div class="col-md-9 pe-5">

                                            <input type="number" name="table" class="form-control form-control-lg"
                                                placeholder="Min 1" />

                                        </div>
                                    </div>

                                    {{-- <hr class="mx-n3"> --}}

                                    <div class="row align-items-center py-3 form-group">
                                        <div class="col-md-3 ps-5">

                                            <h6 class="mb-0">Jumlah ruangan</h6>

                                        </div>
                                        <div class="col-md-9 pe-5">

                                            <input type="number" name="room" class="form-control form-control-lg"
                                                placeholder="Min 1" />

                                        </div>
                                    </div>

                                    {{-- <hr class="mx-n3"> --}}

                                    <div class="row align-items-center py-3 form-group">
                                        <div class="col-md-3 ps-5">

                                            <h6 class="mb-0">Alamat</h6>

                                        </div>
                                        <div class="col-md-9 pe-5">

                                            <textarea class="form-control" name="address" rows="3" placeholder="Alamat lengkap"></textarea>

                                        </div>
                                    </div>


                                    {{-- <hr class="mx-n3"> --}}

                                    <div class="row align-items-center py-3 form-group">
                                        <div class="col-md-3 ps-5">

                                            <h6 class="mb-0">Upload Gambar</h6>

                                        </div>
                                        <div class="col-md-9 pe-5">

                                            <input class="form-control form-control-lg" id="formFileLg" name="image"
                                                type="file" />
                                            <div class="small text-muted mt-2">Upload gambar maksimal 2 MB</div>

                                        </div>
                                    </div>
                                    <input type="hidden" id="latlng" name="latlng">
                                    <div class="row align-items-center py-3 form-group">
                                        <div class="col-md-3 ps-5">

                                            <h6 class="mb-0">Tandai lokasi resto</h6>

                                        </div>
                                        <div class="col-md-9 pe-5">

                                            <div id="map-kuliner"></div>

                                        </div>
                                    </div>


                                    <hr class="mx-n3">

                                    <div class="px-5 py-4">
                                        <button type="submit" class="btn btn-primary btn-lg">Buka Resto</button>
                                    </div>

                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- /.container-fluid -->
@endsection
@push('addon-script')
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key={{ config('maps.api_key') }}&callback=initMap&libraries=places&v=weekly"
        defer></script>
    <script>
        async function initMap() {
            // Request needed libraries.
            const {
                Map,
                InfoWindow
            } = await google.maps.importLibrary("maps");
            const {
                AdvancedMarkerElement
            } = await google.maps.importLibrary("marker");

            // const address = document.getElementById("address");
            const latlngInput = document.getElementById("latlng");
            const geocoder = new google.maps.Geocoder();

            const map = new Map(document.getElementById("map-kuliner"), {
                center: {
                    lat: -8.581632599999997,
                    lng: 116.1013524
                },
                zoom: 14,
                streetViewControl: false,
                fullscreenControl: false,
                mapId: "4504f8b37365c3d0",
            });
            const infoWindow = new InfoWindow();
            const draggableMarker = new AdvancedMarkerElement({
                map,
                position: {
                    lat: -8.581632599999997,
                    lng: 116.1013524
                },
                gmpDraggable: true,
                title: "This marker is draggable.",
            });
            latlngInput.value = "-8.581632599999997,116.1013524";
            draggableMarker.addListener("dragend", (event) => {
                const position = draggableMarker.position;
                latlngInput.value = `${position.lat},${position.lng}`;
                geocodeLatLng(position, geocoder, infoWindow, draggableMarker);
            });

        }
        // geocoder coordinate to address
        function geocodeLatLng(position, geocoder, infoWindow, draggableMarker) {

            const latlng = {
                lat: position.lat,
                lng: position.lng,
            };

            geocoder
                .geocode({
                    location: latlng
                })
                .then((response) => {
                    if (response.results[0]) {
                        infoWindow.setContent(response.results[0].formatted_address);
                        infoWindow.open(draggableMarker.map, draggableMarker);
                        // address.value = response.results[0].formatted_address;
                    } else {
                        window.alert("No results found");
                    }
                })
                .catch((e) => window.alert("Geocoder failed due to: " + e));
        }

        window.initMap = initMap;
    </script>
@endpush
