@extends('layouts.layout')
@section('title', 'Dashboard')
@section('login_as', 'Guru')
@section('user-login')
    @if (Auth::check())
    {{ Auth::user()->pegNama }}
    @endif
@endsection
@section('user-login2')
    @if (Auth::check())
    {{ Auth::user()->pegNama }}
    @endif
@endsection
@section('sidebar-menu')
    @include('guru/sidebar')
@endsection
@push('styles')
    <!-- Styles -->
    <style>
        #chartdiv, #chartdiv2 {
            width: 100%;
            height: 200px;
        }

        #chartdiv3, #chartdiv4 {
            width: 100%;
            height: 300px;
        }
    </style>
@endpush
@section('content')
{{-- {{ Auth::user()->pegNip }} --}}
<section class="panel" style="margin-bottom:20px;">
    <header class="panel-heading" style="color: #ffffff;background-color: #074071;border-color: #fff000;border-image: none;border-style: solid solid none;border-width: 4px 0px 0;border-radius: 0;font-size: 14px;font-weight: 700;padding: 15px;">
        <i class="fa fa-home"></i>&nbsp;Dashboard
        <span class="tools pull-right" style="margin-top:-5px;">
            <a class="fa fa-chevron-down" href="javascript:;" style="float: left;margin-left: 3px;padding: 10px;text-decoration: none;"></a>
            <a class="fa fa-times" href="javascript:;" style="float: left;margin-left: 3px;padding: 10px;text-decoration: none;"></a>
        </span>
    </header>
    <div class="panel-body" style="border-top: 1px solid #eee; padding:15px; background:white;">
        <div class="row" style="margin-right:-15px; margin-left:-15px;">
            <div class="col-md-12">Selamat datang <strong> {{ Auth::user()->pegNama }} </strong> di halaman guru pada<b>  Sistem Informasi Kepegawaian Madrasah Islam Negeri Insan Cendikia (MAN IC) Bengkulu Tengah</b></div>
        </div>
    </div>
</section>
    <div class="row">
        <div class="col-md-12">
            <section class="panel">
                <header class="panel-heading" style="color: #ffffff;background-color: #074071;border-color: #fff000;border-image: none;border-style: solid solid none;border-width: 4px 0px 0;border-radius: 0;font-size: 14px;font-weight: 700;padding: 15px;">
                    <i class="fa fa-bar-chart"></i>&nbsp;Informasi Detail Data Personal
                </header>
                <div class="panel-body" style="border-top: 1px solid #eee; padding:15px; background:white;">
                    <div class="row">
                        <div class="col-lg-3 col-xs-3 col-md-3" style="padding-bottom:10px !important;">
                            <!-- small box -->
                            <div class="small-box bg-aqua" style="margin-bottom:0px;">
                                <div class="inner">
                                <h3>
                                    @if ($personal->pegPendAkhir != null)
                                        {{ $personal->pegPendAkhir }}
                                        @else
                                        -
                                    @endif
                                </h3>
        
                                <p>Pendidikan Terakhir</p>
                                </div>
                                <div class="icon">
                                <i class="fa fa-list"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-xs-3 col-md-3" style="padding-bottom:10px !important;">
                            <!-- small box -->
                            <div class="small-box bg-red" style="margin-bottom:0px;">
                                <div class="inner">
                                <h3>
                                    @if ($personal->pegNmJabatan != null)
                                        {{ $personal->pegNmJabatan }}
                                        @else
                                        -
                                    @endif
                                </h3>
        
                                <p>Nama Jabatan</p>
                                </div>
                                <div class="icon">
                                <i class="fa fa-list-alt"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-xs-3 col-md-3" style="padding-bottom:10px !important;">
                            <!-- small box -->
                            <div class="small-box bg-yellow" style="margin-bottom:0px;">
                                <div class="inner">
                                <h3>
                                    @if ($personal->pegGolTerakhir != null)
                                        {{ $personal->pegGolTerakhir }}
                                        @else
                                        -
                                    @endif
                                </h3>
        
                                <p>Golongan Terakhir</p>
                                </div>
                                <div class="icon">
                                <i class="fa fa-wpforms"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-xs-3 col-md-3" style="padding-bottom:10px !important;">
                            <!-- small box -->
                            <div class="small-box bg-green" style="margin-bottom:0px;">
                                <div class="inner">
                                <h3>
                                    @if ($personal->pegStapeg != "1")
                                        Tidak Aktif
                                        @else
                                        Aktif
                                    @endif
                                </h3>
        
                                <p>Status Pegawai</p>
                                </div>
                                <div class="icon">
                                <i class="fa fa-check-circle"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

@endsection