@extends('layouts.layout')
@section('title', 'Manajemen Klasifikasi Berkas')
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
                    <form action="{{ route('guru.istri_atau_suami.post') }}" enctype="multipart/form-data" method="POST">
                        {{ csrf_field() }} {{ method_field('POST') }}

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Nama Istri/Suami</label>
                                <input type="text" name="kelNama" class="tags form-control @error('kelNama') is-invalid @enderror" />
                                @if ($errors->has('kelNama'))
                                    <small class="form-text text-danger">{{ $errors->first('kelNama') }}</small>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Pekerjaan</label>
                                <select name="tingkat_pendidikan" class="form-control">
                                    <option disabled>-- pilih pekerjaan --</option>
                                    <option value="PNS">PNS</option>
                                    <option value="SEWASTA">SEWASTA</option>
                                </select>
                                @if ($errors->has('kelKerjaan'))
                                    <small class="form-text text-danger">{{ $errors->first('kelKerjaan') }}</small>
                                @endif
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">NIP</label>
                                <input type="text" name="kelNip" class="tags form-control @error('kelNip') is-invalid @enderror" />
                                @if ($errors->has('kelNip'))
                                    <small class="form-text text-danger">{{ $errors->first('kelNip') }}</small>
                                @endif
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Tempat Lahir</label>
                                <input type="text" name="kelTpLhr" class="tags form-control @error('kelTpLhr') is-invalid @enderror" />
                                @if ($errors->has('kelTpLhr'))
                                    <small class="form-text text-danger">{{ $errors->first('kelTpLhr') }}</small>
                                @endif
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Tanggal Lahir</label>
                                <input type="date" name="kelTglLhr" class="tags form-control @error('kelTglLhr') is-invalid @enderror" />
                                @if ($errors->has('kelTglLhr'))
                                    <small class="form-text text-danger">{{ $errors->first('kelTglLhr') }}</small>
                                @endif
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Tanggal Nikah</label>
                                <input type="date" name="kelTglNikah" class="tags form-control @error('kelTglNikah') is-invalid @enderror" />
                                @if ($errors->has('kelTglNikah'))
                                    <small class="form-text text-danger">{{ $errors->first('kelTglNikah') }}</small>
                                @endif
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Tanggal Cerai</label>
                                <input type="date" name="kelTglCerai" class="tags form-control @error('kelTglCerai') is-invalid @enderror" />
                                @if ($errors->has('kelTglCerai'))
                                    <small class="form-text text-danger">{{ $errors->first('kelTglCerai') }}</small>
                                @endif
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Tanggal Meninggal</label>
                                <input type="date" name="kelTglNinggal" class="tags form-control @error('kelTglNinggal') is-invalid @enderror" />
                                @if ($errors->has('kelTglNinggal'))
                                    <small class="form-text text-danger">{{ $errors->first('kelTglNinggal') }}</small>
                                @endif
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">BPJS No</label>
                                <input type="text" name="kelBpjs" class="tags form-control @error('kelBpjs') is-invalid @enderror" />
                                @if ($errors->has('kelBpjs'))
                                    <small class="form-text text-danger">{{ $errors->first('kelBpjs') }}</small>
                                @endif
                            </div>

                        <div class="col-md-12 text-center">
                            <hr style="width: 50%" class="mt-0">
                            <a href="{{ route('guru.personal') }}" class="btn btn-warning btn-sm" style="color: white"><i class="fa fa-arrow-left"></i>&nbsp; Kembali</a>
                            <button type="reset" name="reset" class="btn btn-danger btn-sm"><i class="fa fa-refresh"></i>&nbsp;Ulangi</button>
                            <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-check-circle"></i>&nbsp;Simpan Data</button>
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
