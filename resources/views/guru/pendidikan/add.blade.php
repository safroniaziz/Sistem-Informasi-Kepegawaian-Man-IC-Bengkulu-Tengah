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
                    <form action="{{ route('guru.pendidikan.post') }}" enctype="multipart/form-data" method="POST">
                        {{ csrf_field() }} {{ method_field('POST') }}
                        <div class="col-md-12">
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Tingkat Pendidikan</label>
                                <input type="text" name="pendNmSekol" class="tags form-control @error('pendNmSekol') is-invalid @enderror" />
                                @if ($errors->has('pendNmSekol'))
                                    <small class="form-text text-danger">{{ $errors->first('pendNmSekol') }}</small>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Nomor Ijazah</label>
                                <input type="text" name="pendNoIjazah" class="tags form-control @error('pendNoIjazah') is-invalid @enderror" />
                                @if ($errors->has('pendNoIjazah'))
                                    <small class="form-text text-danger">{{ $errors->first('pendNoIjazah') }}</small>
                                @endif
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Tahun Lulus</label>
                                <input type="text" name="tahun_lulus" class="tags form-control @error('tahun_lulus') is-invalid @enderror" />
                                @if ($errors->has('tahun_lulus'))
                                    <small class="form-text text-danger">{{ $errors->first('tahun_lulus') }}</small>
                                @endif
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Tanggal Lulus</label>
                                <input type="date" name="tanggal_lulus" class="tags form-control @error('tanggal_lulus') is-invalid @enderror" />
                                @if ($errors->has('tanggal_lulus'))
                                    <small class="form-text text-danger">{{ $errors->first('tanggal_lulus') }}</small>
                                @endif
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Tempat Sekolah</label>
                                <input type="text" name="tempat_sekolah" class="tags form-control @error('tempat_sekolah') is-invalid @enderror" />
                                @if ($errors->has('tempat_sekolah'))
                                    <small class="form-text text-danger">{{ $errors->first('tempat_sekolah') }}</small>
                                @endif
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Jurusan</label>
                                <input type="text" name="jurusan" class="tags form-control @error('jurusan') is-invalid @enderror" />
                                @if ($errors->has('jurusan'))
                                    <small class="form-text text-danger">{{ $errors->first('jurusan') }}</small>
                                @endif
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Upload Ijazah : <a class="text-danger">Harap masukan file DOC/PDF. Max : 2MB</a></label>
                                <input type="file" name="upload_ijazah" id="upload_ijazah" class="form-control @error('upload_ijazah') is-invalid @enderror" style="padding-bottom:30px;">
                                @if ($errors->has('upload_ijazah'))
                                    <small class="form-text text-danger">{{ $errors->first('upload_ijazah') }}</small>
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
