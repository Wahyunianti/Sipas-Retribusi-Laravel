@extends('layouts.main', ['title' => 'Dashboard', 'page_heading' => 'Sistem Informasi Retribusi Pasar Nganjuk'])

@section('contents')
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-12">
            <div class="row">
                <div class="col-6 col-lg-4 col-md-6">                   
                    <div class="card card-stat">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-4">
                                    <div class="stats-icon purple">
                                        <i class="iconly-boldLocation"></i>
                                    </div>
                                </div>
                                <div class="col-8">
                                    <h6 class="text-muted font-semibold">Jumlah Pasar</h6>
                                    <h6 class="font-extrabold mb-0">
                                        {{ $ctPasar }}
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
                <div class="col-6 col-lg-4 col-md-6">
                    <div class="card card-stat">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-4">
                                    <div class="stats-icon red">
                                        <i class="iconly-boldPassword"></i>
                                    </div>
                                </div>
                                <div class="col-8">
                                    <h6 class="text-muted font-semibold">Jumlah Bagian</h6>
                                    <h6 class="font-extrabold mb-0">
                                        {{ $ctBagian }}
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
                <div class="col-6 col-lg-4 col-md-6">
                    <div class="card card-stat">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-4">
                                    <div class="stats-icon green">
                                        <i class="iconly-boldActivity"></i>
                                    </div>
                                </div>
                                <div class="col-8">
                                    <h6 class="text-muted font-semibold">Jumlah Retribusi</h6>
                                    <h6 class="font-extrabold mb-0">
                                        {{ $ctRet }}
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('utilities.alert-flash-message')
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div id="chart-profile-visit">
		                            @include('menu.dashboard.charts.chart')

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection