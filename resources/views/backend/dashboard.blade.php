@extends('backend.layouts')
@section('content')
    <div class="page_title">
        <h2>Dashboard</h2>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h1 style="text-align: center">
                        Selamat Datang {{ Auth::user()->name }}
                    </h1>
                    <br>
                    <h2 style="text-align: center">{{ date('d-m-Y', strtotime(date('Y-m-d'))) }}</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="row column1 m-2 justify-content-center">
        <div class="col-md-6 col-lg-3">
            <div class="full counter_section margin_bottom_30 yellow_bg">
                <div class="couter_icon">
                    <div>
                        <i class="fa fa-bed"></i>
                    </div>
                </div>
                <div class="counter_no">
                    <div>
                        <p class="total_no" style="color: white">150</p>
                        <p class="total_no" style="color: white">Tersedia</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="full counter_section margin_bottom_30 blue1_bg">
                <div class="couter_icon">
                    <div>
                        <i class="fa fa-users"></i>
                    </div>
                </div>
                <div class="counter_no">
                    <div>
                        <p class="total_no" style="color: white">35</p>
                        <p class="total_no" style="color: white">Dokter</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="full counter_section margin_bottom_30 green_bg">
                <div class="couter_icon">
                    <div>
                        <i class="fa fa-book"></i>
                    </div>
                </div>
                <div class="counter_no">
                    <div>
                        <p class="total_no" style="color: white">25</p>
                        <p class="total_no" style="color: white">Poli</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
