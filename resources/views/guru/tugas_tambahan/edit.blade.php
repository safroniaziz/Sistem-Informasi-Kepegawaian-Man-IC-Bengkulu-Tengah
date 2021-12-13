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
                    <form action="{{ route('guru.tugas_tambahan.update',[$data->tgsNoUrut]) }}" enctype="multipart/form-data" method="POST">
                        {{ csrf_field() }} {{ method_field('PATCH') }}
                        <div class="col-md-12">
                           

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Tugas Tambahan</label>
                                <input type="text" value="{{ $data->tgsNamajab }}" name="tgsNamajab" class="tags form-control @error('tgsNamajab') is-invalid @enderror" />
                                <div>
                                    @if ($errors->has('tgsNamajab'))
                                        <small class="form-text text-danger">{{ $errors->first('tgsNamajab') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Tamatan</label>
                                <input type="date" value="{{ $data->tgsTmt }}" name="tgsTmt" class="tags form-control @error('tgsTmt') is-invalid @enderror" />
                                <div>
                                    @if ($errors->has('tgsTmt'))
                                        <small class="form-text text-danger">{{ $errors->first('tgsTmt') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Nomor SK</label>
                                <input type="text" value="{{ $data->tgsNoSk }}" name="tgsNoSk" class="tags form-control @error('tgsNoSk') is-invalid @enderror" />
                                <div>
                                    @if ($errors->has('tgsNoSk'))
                                        <small class="form-text text-danger">{{ $errors->first('tgsNoSk') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Tanggal SK</label>
                                <input type="date" value="{{ $data->tgsTglSk }}" name="tgsTglSk" class="tags form-control @error('tgsTglSk') is-invalid @enderror" />
                                <div>
                                    @if ($errors->has('tgsTglSk'))
                                        <small class="form-text text-danger">{{ $errors->first('tgsTglSk') }}</small>
                                    @endif
                                </div>
                            </div>

                          

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Upload Dokumen : <a class="text-danger">Harap masukan file DOC/PDF. Max : 2MB</a></label>
                                <input type="file" name="tgsDokumen" id="tgsDokumen" class="form-control @error('tgsDokumen') is-invalid @enderror" style="padding-bottom:30px;">
                                <div>
                                    @if ($errors->has('tgsDokumen'))
                                        <small class="form-text text-danger">{{ $errors->first('tgsDokumen') }}</small>
                                    @endif
                                </div>
                            </div>

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
