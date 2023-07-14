@extends('layouts.resto')

@section('title', 'Resto - Makan')

@section('content')
    <!-- Begin Page Content -->
    <div class="content">
        <!-- Animated -->
        <div class="animated fadeIn">
            <!-- Widgets  -->
            <div class="row">

                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat-widget-five">
                                <div class="stat-icon dib flat-color-2">
                                    <i class="pe-7s-users"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib">
                                        <div class="stat-text">{{$trans_count}}</span></div>
                                        <div class="stat-heading">Pemesan</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat-widget-five">
                                <div class="stat-icon dib flat-color-3">
                                    <i class="pe-7s-browser"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib">
                                        <div class="stat-text">{{$trans_success_count}}</span></div>
                                        <div class="stat-heading">Reservasi Berhasil</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat-widget-five">
                                <div class="stat-icon dib flat-color-4">
                                    <i class="pe-7s-browser"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib">
                                        <div class="stat-text">{{$trans_pending_count}}</span></div>
                                        <div class="stat-heading">Reservasi Pending</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /Widgets -->
            <!--  Traffic  -->

            <div class="content">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Transaksi</h1>
                    <form action="{{route('pdf-trans')}}" method="post">
                        @csrf
                        <button type="submit" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                            class="fa fa-download fa-sm text-white-50"></i> Unduh laporan</button>
                    </form>
                </div>

                <div class="card shadow">
                    <div class="card card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Pemesan</th>
                                    <th>Meja</th>
                                    <th>Tanggal dan Waktu</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($items as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->user->name }}</td>
                                        <td>{{ $item->detailHeaders->pluck('booking_number')->implode(', ') }}</td>
                                        <td>{{$item->date}} & {{$item->time}}</td>
                                        <td>{{ $item->detailHeaders->flatMap(function ($detailHeader) {
                                            return $detailHeader->trans_details->pluck('quantity');
                                        })->sum() }}</td>
                                        <td>Rp {{ $item->transaction_total }}</td>
                                        <td>{{ $item->transaction_status }}</td>

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
        <!-- /#add-category -->
        </div>
        <!-- .animated -->
    </div>
<!-- /.container-fluid -->
@endsection

