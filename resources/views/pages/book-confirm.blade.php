@extends('layouts.book')
@section('title', 'Makan - Pemesanan')
@section('content')
<div class="container header bg-white pt-lg-5">
    <div class="row g-0 flex-column-reverse flex-md-row">
        <div class="col-md-0 pt-5 mt-lg-5">
            <h3 class="animated fadeIn">RM Yatai, Pendidikan</h3>
        </div>
    </div>
</div>
<!-- Header End -->


<section class="container mt-5">
    <div class="card text-start mx-auto">
        <h4 class="py-3 text-center">Periksa Pemesanan Anda</h4>
        <div class="card my-lg-4 mx-lg-5">
            <div class="row gx-5 py-3 px-3">
                <div class="col d-flex justify-content-start">
                 <div class="row text-start">
                    <div class="h5">Meja Nomor 24</div>
                    <!-- <div class="ps-4">Regular</div>
                    <div class="ps-4 pb-3"><strong>22 Juni 2023 09.00-10.00</strong></div> -->
                 </div>
                </div>
                <div class="col d-flex justify-content-end">
                  <div class="row text-end">
                    <div class="h5 ">Rp 20.000</div>
                    <!-- <div class=" pe-4"><span class="fa fa-mendeley"></span> Hapus</div> -->
                  </div>
                </div>
              </div>
        </div>

        <div class="mx-lg-5 my-lg-3">
            <div class="h5">Lengkapi dulu</div>
            <div class="form-group my-lg-3">
                <label for="date">Tanggal</label>
                <input type="date" class="form-control" name="date" placeholder="Tanggal">
            </div>
            <br>
            <div class="form-group">
                <label for="time-from">Dari jam</label>
                <input type="text" class="form-control" name="time-from" placeholder="Jam" >
            </div>
            <br>
            <div class="form-group">
                <label for="time-to">Sampai</label>
                <input type="text" name="time-to" placeholder="Jam" class="form-control" >
            </div>
            <br>

        </div>

    </div>
</section>


<!-- Property List End -->
<div style="position:fixed; width: 100%; bottom: 0; display: block;"
class="bg-white pay-book">
    <nav class="container bg-white navbar-light py-3 px-4 text-center d-grid">
        <button class="btn btn-danger py-2 rounded-3 text-uppercase" style="color: white;">Konfirmasi Pemesanan</button>

    </nav>
</div>
@endsection
