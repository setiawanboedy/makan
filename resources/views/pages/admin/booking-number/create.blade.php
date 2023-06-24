@extends('layouts.admin')
@section('title','Admin - Buat Nomer Booking')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Nomer Booking</h1>

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
                <form action="{{route('booking-number.store')}}" method="post" >
                    @csrf

                    <div class="form-group">
                        <label for="booking_numbers_id">Tempat Kuliner</label>
                        <select name="booking_numbers_id" required class="form-control">
                            <<option value="">Pilih Tempat Kuliner</option>
                            @foreach ($kuliner_places as $place)
                            <option value="{{$place->id}}">
                                {{$place->name}}
                            </option>

                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="nomer">Nomer</label>
                        <input type="number" name="nomer" placeholder="Nomer" class="form-control" value="{{old('nomer')}}">
                    </div>
                    <div class="form-group">
                        <label for="paket">Status</label>
                        <select name="paket" required class="form-control">
                            <option value="Regular">Regular</option>
                            <option value="VIP">
                                VIP
                            </option>
                        </select>
                    </div>


                    <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                </form>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
