@extends('layouts.layout')
@section('title', 'Manajemen Klasifikasi Berkas')
@section('login_as', 'Guru')
@section('user-login')
    @if (Auth::check())
    {{ Auth::user()->nm_user }}
    @endif
@endsection
@section('user-login2')
    @if (Auth::check())
    {{ Auth::user()->nm_user }}
    @endif
@endsection
@section('sidebar-menu')
    @include('guru/sidebar')
@endsection
@push('styles')
    <style>
        #selengkapnya{
            color:#5A738E;
            text-decoration:none;
            cursor:pointer;
        }
        #selengkapnya:hover{
            color:#007bff;
        }
    </style>
@endpush
@section('content')
    <section class="panel" style="margin-bottom:20px;">
        <header class="panel-heading" style="color: #ffffff;background-color: #074071;border-color: #fff000;border-image: none;border-style: solid solid none;border-width: 4px 0px 0;border-radius: 0;font-size: 14px;font-weight: 700;padding: 15px;">
            <i class="fa fa-home"></i>&nbsp;Arsip Dokumen Universitas Bengkulu
        </header>
        <div class="panel-body" style="border-top: 1px solid #eee; padding:15px; background:white;">
            <div class="row" style="margin-right:-15px; margin-left:-15px;">
                <div class="col-md-12">
                    <div class="alert alert-primary alert-block text-center" id="keterangan">

                        <strong class="text-uppercase"><i class="fa fa-info-circle"></i>&nbsp;Perhatian: </strong><br> Silahkan tambahkan usulan kegiatan anda, harap melengkapi data terlebih dahulu agar proses pengajuan usulan tidak ada masalah kedepannya !!
                    </div>
                </div>
                <div class="row">
                    <form action="{{ route('guru.personal.post') }}" enctype="multipart/form-data" method="POST">
                        {{ csrf_field() }} {{ method_field('POST') }}
                        <div class="col-md-12">
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Golongan / Ruang</label>
                                <input type="text" name="golongan" class="tags form-control @error('golongan') is-invalid @enderror" />
                                @if ($errors->has('golongan'))
                                    <small class="form-text text-danger">{{ $errors->first('golongan') }}</small>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">TMT Golongan</label>
                                <input type="text" name="tmt_golongan" class="tags form-control @error('tmt_golongan') is-invalid @enderror" />
                                @if ($errors->has('tmt_golongan'))
                                    <small class="form-text text-danger">{{ $errors->first('tmt_golongan') }}</small>
                                @endif
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Nomor SK</label>
                                <input type="text" name="nomor_sk" class="tags form-control @error('nomor_sk') is-invalid @enderror" />
                                @if ($errors->has('nomor_sk'))
                                    <small class="form-text text-danger">{{ $errors->first('nomor_sk') }}</small>
                                @endif
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Tanggal SK</label>
                                <input type="text" name="tanggal_sk" class="tags form-control @error('tanggal_sk') is-invalid @enderror" />
                                @if ($errors->has('tanggal_sk'))
                                    <small class="form-text text-danger">{{ $errors->first('tanggal_sk') }}</small>
                                @endif
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Masa Kerja Gol</label>
                                <input type="text" name="masa_kerja_gol" class="tags form-control @error('masa_kerja_gol') is-invalid @enderror" />
                                @if ($errors->has('masa_kerja_gol'))
                                    <small class="form-text text-danger">{{ $errors->first('masa_kerja_gol') }}</small>
                                @endif
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Gaji Pokok</label>
                                <input type="text" name="gaji_pokok" class="tags form-control @error('gaji_pokok') is-invalid @enderror" />
                                @if ($errors->has('gaji_pokok'))
                                    <small class="form-text text-danger">{{ $errors->first('gaji_pokok') }}</small>
                                @endif
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">SK Kepangkatan : <a class="text-danger">Harap masukan file DOC/PDF. Max : 2MB</a></label>
                                <input type="file" name="sk_kepangkatan" id="sk_kepangkatan" class="form-control @error('sk_kepangkatan') is-invalid @enderror" style="padding-bottom:30px;">
                                @if ($errors->has('sk_kepangkatan'))
                                    <small class="form-text text-danger">{{ $errors->first('sk_kepangkatan') }}</small>
                                @endif
                            </div>

                        </div>
                        <div class="col-md-12 text-center">
                            <hr style="width: 50%" class="mt-0">
                            <a href="{{ route('guru.personal') }}" class="btn btn-warning btn-sm" style="color: white"><i class="fa fa-arrow-left"></i>&nbsp; Kembali</a>
                            <button type="reset" name="reset" class="btn btn-danger btn-sm"><i class="fa fa-refresh"></i>&nbsp;Ulangi</button>
                            <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-check-circle"></i>&nbsp;Simpan Berkas</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        $(document).ready(function(){
            $('.tags-selector').select2();
        })
    </script>
@endpush
