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
    @endsection
