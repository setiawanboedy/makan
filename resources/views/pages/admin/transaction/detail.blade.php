@extends('layouts.admin')
@section('title','Admin - Edit Transaksi')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid content"

      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Transaksi {{ $item->user->name }}</h1>
      </div>

      <!-- Content Row -->
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
                <table class="table table-bordered">
                     @foreach ($item->detailHeaders as $header)
                     <tr>
                        <th>ID</th>
                        <th>Tempat</th>
                        <th>Nomor Meja</th>
                    </tr>
                    <tr>
                        <td>{{ $header->id }}</td>
                        <td>{{ $header->name_place }}</td>
                        <td>{{ $header->booking_number }}</td>
                    </tr>

                    @foreach($header->trans_details as $detail)
                    <tr>
                        <th>ID</th>
                        <th>Gambar</th>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Kuantitas</th>
                        <th>Total</th>
                    </tr>
                        <tr>
                            <td>{{ $detail->id }}</td>
                            <td>
                                <img src="{{Storage::url($detail->image)}}" alt="" style="width: 150px; height:150px" class="img-thumbnail">
                            </td>
                            <td>{{ $detail->name }}</td>
                            <td>{{ $detail->price }}</td>
                            <td>{{ $detail->quantity }}</td>
                            <td>{{ $detail->total }}</td>
                        </tr>
                    @endforeach
                     @endforeach
                </table>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
