@extends('layouts.resto')
@section('title','resto - Tempat Kuliner')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Tempat Kuliner</h1>

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
                <form action="{{route('resto.update')}}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" name="name" placeholder="Name" value="{{$item->name}}">
                    </div>
                    <div class="form-group">
                        <label for="name">No. Hp</label>
                        <input type="number" class="form-control" name="hp" placeholder="No. Hp" value="{{$item->hp}}">
                    </div>
                    <input type="hidden" name="resto_id" value="{{$item->id}}">
                    <div class="form-group">
                        <select name="status" required class="form-control">
                            <option value="">{{ $item->status }}</option>
                            <option value="Buka">
                                Buka
                            </option>
                            <option value="Tutup">
                                Tutup
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
