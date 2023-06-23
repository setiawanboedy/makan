@extends('layouts.admin')

@section('title', 'Admin - Makan')

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
                                <div class="stat-icon dib flat-color-1">
                                    <i class="pe-7s-home"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib">
                                        <div class="stat-text">69</span></div>
                                        <div class="stat-heading">Restoran</div>
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
                                <div class="stat-icon dib flat-color-2">
                                    <i class="pe-7s-users"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib">
                                        <div class="stat-text">35</span></div>
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
                                        <div class="stat-text">49</span></div>
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
                                        <div class="stat-text">6</span></div>
                                        <div class="stat-heading">Reservasi Gagal</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Widgets -->
            <!--  Traffic  -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="box-title">Traffic </h4>
                        </div>
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="card-body">
                                    <canvas id="TrafficChart"></canvas>
                                    <div id="traffic-chart" class="traffic-chart"></div>
                                </div>
                            </div>

                        </div> <!-- /.row -->
                        <div class="card-body"></div>
                    </div>
                </div><!-- /# column -->
            </div>

            <!--  /Traffic -->
            <div class="clearfix"></div>

        <!-- /#add-category -->
        </div>
        <!-- .animated -->
    </div>
<!-- /.container-fluid -->
@endsection

