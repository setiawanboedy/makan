@extends('layouts.admin')
@section('title', 'Admin - Nomer Booking')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid content">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Nomer Booking</h1>
            <a href="{{ route('booking-number.create') }}" class="btn btn-sm btn-primary shadow-sm">
                <i class="text-white-50"></i> Tambah Nomer Booking
            </a>
        </div>

        <div class="card shadow">
            <div class="card card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tempat Kuliner</th>
                            <th>Nomer</th>
                            <th>Paket</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($items as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->kuliner_place->name }}</td>
                                <td>{{ $item->nomer }}</td>
                                <td>{{ $item->paket }}</td>
                                <td>
                                    <a href="{{route('booking-number.edit', $item->id) }}" class="btn btn-info">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <form action="{{route('booking-number.destroy', $item->id)}}" method="post" class="d-inline">
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
