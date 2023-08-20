@extends('layouts.resto')
@section('title','resto - Tambah Kuliner')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Makanan</h1>

        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>

                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card shadow">
            <div class="card-body">
                <form action="{{route('food.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama Makanan</label>
                        <input type="text" class="form-control" name="name" placeholder="Name" value="{{old('name')}}">
                    </div>
                    <div class="form-group">
                        <label for="image">Gambar</label>
                        <input type="file" name="image" placeholder="Image" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="price">Harga</label>
                        <input type="number" name="price" placeholder="Harga" class="form-control">
                    </div>
                    <input type="hidden" name="place_id" value="{{$resto_id}}">
                    {{-- <div class="form-group">
                        <label for="place_id">Nama Tempat Makan</label>
                        <select name="place_id" required class="form-control">
                            <<option value="">Pilih Tempat Kuliner</option>
                            @foreach ($kuliner_places as $place)
                            <option value="{{$place->id}}">
                                {{$place->name}}
                            </option>
                            @endforeach
                        </select>
                    </div> --}}
                    <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                </form>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
