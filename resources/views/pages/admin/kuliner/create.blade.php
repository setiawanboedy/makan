@extends('layouts.admin')
@section('title','Admin - Tambah Kuliner')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Paket Travel</h1>

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
                <form action="{{route('kuliner-place.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama Toko</label>
                        <input type="text" class="form-control" name="name" placeholder="Name" value="{{old('name')}}">
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
                        <textarea name="address" rows="3" class="d-block w-100 form-control">{{old('address')}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">Gambar</label>
                        <input type="file" name="image" placeholder="Image" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="table">Jumlah Meja</label>
                        <input type="text" class="form-control" name="table" placeholder="Table" value="{{old('table')}}">

                    </div>
                    <div class="form-group">
                        <label for="room">Jumlah Ruagan</label>
                        <input type="text" class="form-control" name="room" placeholder="Room" value="{{old('room')}}">
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                </form>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
