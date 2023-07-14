@extends('layouts.detail')
@section('title', 'Makan - Pemesanan')

@section('content')

    <section class="h-100">
        <div class="container h-100 py-5">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-10">

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h3 class="fw-normal mb-0 text-black">Daftar Transaksi</h3>
                    </div>

                    @forelse ($transactions as $item)
                        <div class="card rounded-3 mb-4">
                            <div class="card-body p-4">
                                <div class="row d-flex justify-content-between align-items-center">
                                    <div class="col-md-2 col-lg-2 col-xl-1">

                                        <div class="number-box-sm text-center">Nomor <br>
                                            {{ $item->detailHeaders->pluck('booking_number')->implode(', ') }}</div>
                                    </div>
                                    <div class="col-md-3 col-lg-3 col-xl-3">
                                        <p class="lead fw-normal mb-2">
                                            {{ $item->detailHeaders->pluck('name_place')->unique()->implode(', ') }}</p>
                                        <p>Makanan x
                                            {{ $item->detailHeaders->flatMap(function ($detailHeader) {
                                                    return $detailHeader->trans_details->pluck('quantity');
                                                })->sum() }}
                                        </p>
                                    </div>
                                    <div class="col-md-3 col-lg-3 col-xl-2">
                                        @if ($item->transaction_status == 'SUCCESS')
                                            <a class="btn btn-success">
                                                {{ $item->transaction_status }}
                                            </a>
                                        @elseif ($item->transaction_status == 'PENDING')
                                            <a class="btn btn-warning ">
                                                {{ $item->transaction_status }}
                                            </a>
                                        @else
                                            <a class="btn btn-danger">
                                                {{ $item->transaction_status }}
                                            </a>
                                        @endif
                                    </div>
                                    <div class="col-md-2 col-lg-2 col-xl-2">
                                        <h5 class="mb-0">Rp {{ $item->transaction_total }}</h5>
                                    </div>
                                    <div class="col-md-2 col-lg-2 col-xl-2 text-end">
                                        @if ($item->prove == null)
                                            <a href="{{route('payment.index', $item->id)}}" class="btn btn-outline-info px-3"><i class="fa fa-upload"
                                                    aria-hidden="true"></i></a>
                                            <p>Uplaod Pembayaran</p>
                                        @else
                                            <p>Sudah bayar</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                    @endforelse

                </div>
            </div>
        </div>
    </section>
@endsection
