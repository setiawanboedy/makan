@extends('layouts.admin')
@section('title', 'Admin - Tempat Kuliner')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Tempat Kuliner {{ $item->title }}</h1>

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
                <form action="{{ route('kuliner-place.update', $item->id) }}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama Toko</label>
                        <input type="text" class="form-control" name="name" placeholder="Name"
                            value="{{ $item->name }}">
                    </div>
                    <div class="form-group">
                        <label for="resto_id">Pemilik Resto</label>
                        <select name="resto_id" required class="form-control">
                            <<option value="{{$item->resto_id}}">Tetapkan Pemilik Resto</option>
                            @foreach ($restos as $resto)
                            <option value="{{$resto->id}}">
                                {{$resto->name}}
                            </option>

                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" required class="form-control">
                            <option value="{{ $item->status }}">Tetapkan</option>
                            <option value="Buka">Buka</option>
                            <option value="Tutup">
                                Tutup
                            </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <div id="map-kuliner"></div>
                        <input type="hidden" id="latlng" name="latlng" value="{{$item->latlng}}">
                        <label for="address">Alamat</label>
                        <textarea id="address" name="address" rows="3" class="d-block w-100 form-control">{{ $item->address }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">Gambar</label>


                        <input type="file" name="image" placeholder="Image" class="form-control">

                    </div>
                    <div class="form-group">
                        <label for="table">Jumlah Meja</label>
                        <input type="text" class="form-control" name="table" placeholder="Table"
                            value="{{ $item->table }}">

                    </div>
                    <div class="form-group">
                        <label for="room">Jumlah Ruagan</label>
                        <input type="text" class="form-control" name="room" placeholder="Room"
                            value="{{ $item->room }}">
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

            const address = document.getElementById("address");
            const geocoder = new google.maps.Geocoder();
            const latlngInput = document.getElementById("latlng");
            // get latlng
            const latlngValue = document.getElementById("latlng").value;
            const latlngStr = latlngValue.split(",", 2);
            const latlng = {
                lat: parseFloat(latlngStr[0]),
                lng: parseFloat(latlngStr[1]),
            };

            const map = new Map(document.getElementById("map-kuliner"), {
                center: latlng,
                zoom: 14,
                streetViewControl: false,
                fullscreenControl: false,
                mapId: "4504f8b37365c3d0",
            });
            const infoWindow = new InfoWindow();
            const draggableMarker = new AdvancedMarkerElement({
                map,
                position: latlng,
                gmpDraggable: true,
                title: "This marker is draggable.",
            });
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
