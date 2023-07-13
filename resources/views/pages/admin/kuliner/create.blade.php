@extends('layouts.admin')
@section('title', 'Admin - Tambah Kuliner')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Tempat Makan</h1>

        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card shadow">
            <div class="card-body">
                <form action="{{ route('kuliner-place.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama Tempat</label>
                        <input type="text" class="form-control" name="name" placeholder="Name"
                            value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" required class="form-control">
                            <option value="Buka">Buka</option>
                            <option value="Tutup">
                                Tutup
                            </option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="address">Alamat</label>
                        <div id="map-kuliner"></div>
                        <textarea id="address" name="address" rows="3" class="d-block w-100 form-control mt-2"
                            placeholder="Alamat Lengkap (Atur lebih dulu di map)">{{ old('address') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">Gambar</label>
                        <input type="file" name="image" placeholder="Image" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="avgprice">Harga rata-rata</label>
                        <input type="text" name="avgprice" placeholder="Harga" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="table">Jumlah Meja</label>
                        <input type="text" class="form-control" name="table" placeholder="Table"
                            value="{{ old('table') }}">

                    </div>
                    <div class="form-group">
                        <label for="room">Jumlah Ruagan</label>
                        <input type="text" class="form-control" name="room" placeholder="Room"
                            value="{{ old('room') }}">
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                </form>
            </div>
        </div>
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

            const address = document.getElementById('address');
            const geocoder = new google.maps.Geocoder();

            const map = new Map(document.getElementById("map-kuliner"), {
                center: {
                    lat: -8.581632599999997,
                    lng: 116.1013524
                },
                zoom: 14,
                streetViewControl:false,
                fullscreenControl:false,
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

            draggableMarker.addListener("dragend", (event) => {
                const position = draggableMarker.position;

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
                        address.value = response.results[0].formatted_address;
                    } else {
                        window.alert("No results found");
                    }
                })
                .catch((e) => window.alert("Geocoder failed due to: " + e));
        }

        window.initMap = initMap;
    </script>
@endpush
