@extends('layouts.admin')
@section('title','Admin - Transaksi')
@section('content')
    <!-- Begin Page Content -->
    <div class="content">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Transaksi</h1>

        </div>

        <div class="card shadow">
            <div class="card card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Pemesan</th>
                            <th>Tanggal dan Waktu</th>
                            <th>Total</th>
                            <th>Bukti</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($items as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->user->name }}</td>
                                <td>{{$item->date}} & {{$item->time}}</td>
                                <td>Rp {{ $item->transaction_total }}</td>
                                <td>
                                    @if ($item->prove != null)
                                    <img src="/{{$item->prove}}" alt="" style="width: 80px; height:80px" class="img-thumbnail">
                                    @else
                                    Belum
                                    @endif

                                </td>
                                <td>{{ $item->transaction_status }}</td>
                                <td>
                                    <a href="{{route('transaction.show', $item->id) }}" class="btn btn-primary">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    {{--<a href="{{route('transaction.edit', $item->id) }}" class="btn btn-info">
                                        <i class="fa fa-pencil"></i>
                                    </a> --}}
                                    <form action="{{route('transaction.destroy', $item->id)}}" method="post" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">
                                    Data Kosong
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
