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
                                @forelse ($item->trans_details as $trans)
                                    <div class="row d-flex justify-content-between align-items-center">


                                        <div class="col-md-3 col-lg-2 col-xl-1">

                                            <div class=" text-center">
                                                <img src="{{ Storage::url($trans->image) }}" width="80" alt="">
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-lg-3 col-xl-3">
                                            <p class="lead fw-normal mb-2">
                                                {{ $trans->name }}</p>
                                            <p>
                                                {{ $trans->quantity }} x {{$trans->price}}
                                            </p>
                                        </div>
                                        <div class="col-md-3 col-lg-3 col-xl-3">
                                            <p class="lead fw-normal mb-2">
                                                Meja dan Jam</p>
                                            <p>
                                                Meja: {{ $trans->nomer }}, Jam: {{$item->time}}
                                            </p>
                                        </div>
                                        <div class="col-md-3 col-lg-3 col-xl-2">
                                            @if ($trans->transaction_status == 'SUCCESS')
                                                <a class="btn btn-success">
                                                    {{ $trans->transaction_status }}
                                                </a>
                                            @elseif ($trans->transaction_status == 'PENDING')
                                                <a class="btn btn-warning ">
                                                    {{ $trans->transaction_status }}
                                                </a>
                                            @else
                                                <a class="btn btn-danger">
                                                    {{ $trans->transaction_status }}
                                                </a>
                                            @endif
                                        </div>

                                    </div>
                                    <br>
                                    <hr>
                                @empty
                                @endforelse
                                <div class="row g-2">
                                    <div class="col-sm-4 col-md-6">
                                        <div class="col-md-6 ">
                                            <h5 class="mb-0">Total: Rp {{ $item->transaction_total }}</h5>
                                        </div>
                                    </div>

                                    <div class="col-sm-8 col-md-6 text-end">

                                        <div class="text-end">
                                            @if ($item->prove == null)
                                                <a href="{{ route('payment.index', $item->id) }}"
                                                    class="btn btn-outline-info px-3"><i class="fa fa-upload"
                                                        aria-hidden="true"></i></a>
                                                <p>Uplaod Pembayaran</p>
                                            @else
                                                <p>Sudah bayar</p>
                                            @endif
                                        </div>
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
