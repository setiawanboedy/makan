@extends('layouts.resto')

@section('title', 'Resto - Makan')

@section('content')
    <!-- Begin Page Content -->
    <div class="content">
        <!-- Animated -->
        <div class="animated fadeIn">
            <!-- Widgets  -->
            {{-- <div class="row"> --}}

                {{-- <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat-widget-five">
                                <div class="stat-icon dib flat-color-3">
                                    <i class="pe-7s-browser"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib">
                                        <div class="stat-text">{{$items}}</span></div>
                                        <div class="stat-heading">Jumlah makanan</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}

                {{-- <div class="col-lg-3 col-md-6">
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
                </div> --}}
                <h2>Selamat datang</h2>

            {{-- </div> --}}
            <div class="content container emp-profile">

                    <div class="row">
                        <div class="col-md-4">
                            <div class="profile-img">
                                <img src="{{ Storage::url($kuliner_place->image) }}" alt="Profile" />

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="profile-head">
                                <h5>
                                    {{ $kuliner_place->name }}
                                </h5>
                                <h6>
                                    Status: {{ $kuliner_place->status }}
                                </h6>
                                <p class="proile-rating">RATING : <span><span class="fa fa-star"
                                            style="color: orange"></span> 4.5</span></p>
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home"
                                            role="tab" aria-controls="home" aria-selected="true">Tentang</a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <a href="{{route('resto.edit', $kuliner_place->id)}}" class="profile-edit-btn" name="btnAddMore" >Edit Resto</a>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="profile-work">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="tab-content profile-tab" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel"
                                    aria-labelledby="home-tab">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Pemilik</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p>{{$owner->name}}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Email</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p>{{$owner->email}}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Phone</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p>123 456 7890</p>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>

            </div>
            <!-- /Widgets -->
            <!--  Traffic  -->

            {{-- <div class="content">

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
									<th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($items as $item)

								<form action="{{ route('resto.update') }}" method="post" class="d-inline">
								@csrf
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->user->name }}</td>
                                        <td>{{ $item->detailHeaders->pluck('booking_number')->implode(', ') }}</td>
                                        <td>{{$item->date}} & {{$item->time}}</td>
                                        <td>{{ $item->detailHeaders->flatMap(function ($detailHeader) {
                                            return $detailHeader->trans_details->pluck('quantity');
                                        })->sum() }}</td>
                                        <td>Rp {{ $item->transaction_total }}</td>

										<td>
                                        <select name="status" required class="form-control">
                                            <option value="">{{ $item->transaction_status }}</option>
                                            <option value="PENDING">Pending</option>
											<option value="SUCCESS">Success</option>
											<option value="CANCEL">Cancel</option>
                                        </select>
										</td>
										<td>

                                        <input type="hidden" name="transId" value="{{$item->id}}">
                                        <button class="btn btn-info">
                                            Update
                                        </button>

										</td>


                                    </tr>
									</form>
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

            </div> --}}
            <!-- /#add-category -->
        </div>
        <!-- .animated -->
    </div>
    <!-- /.container-fluid -->
@endsection
