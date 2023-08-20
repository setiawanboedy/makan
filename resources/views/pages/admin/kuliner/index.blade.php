@extends('layouts.admin')
@section('title', 'Admin - Tempat Kuliner')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid content">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tempat Kuliner</h1>
            {{-- <a href="{{ route('kuliner-place.create') }}" class="btn btn-sm btn-primary shadow-sm">
                <i class="text-white-50"></i> Tambah Paket Travel
            </a> --}}
        </div>

        <div class="card shadow">
            <div class="card card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Status</th>
                            <th>Gambar</th>
                            <th>Alamat</th>
                            <th>Meja</th>
                            <th>Ruangan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($items as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->status }}</td>
                                <td>
                                    <img src="{{ Storage::url($item->image) }}" alt="" style="width: 150px">
                                </td>
                                <td>{{ $item->address }}</td>
                                <td>{{ $item->table }}</td>
                                <td>{{ $item->room }}</td>
                                <td>

                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                        data-target="#exampleModalCenter">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            {{-- modal --}}

                            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Apakah yakin akan
                                                menghapusnya?</h5>

                                        </div>
                                        <div class="modal-body">
                                            Semua data nomor meja yang berkaitan dengan data ini akan dihapus juga!
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Batal</button>
                                            <form action="{{ route('kuliner-place.destroy', $item->id) }}" method="post"
                                                class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
