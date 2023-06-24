@extends('layouts.admin')
@section('title','Admin - Tempat Kuliner')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Tempat Kuliner {{$item->title}}</h1>

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
                <form action="{{route('booking-number.update', $item->id)}}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="booking_numbers_id">Tempat Kuliner</label>
                        <select name="booking_numbers_id" required class="form-control" disabled>
                            <option value="{{$item->kuliner_place->name}}">{{$item->kuliner_place->name}}</option>

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="nomer">Nomer</label>
                        <input type="number" name="nomer" placeholder="Nomer" class="form-control" value="{{$item->nomer}}">
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
