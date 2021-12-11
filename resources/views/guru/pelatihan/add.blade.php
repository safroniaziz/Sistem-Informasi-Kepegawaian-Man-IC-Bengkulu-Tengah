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
            <i class="fa fa-home"></i>&nbsp;Sistem Informasi Kepegawaian MAN IC Bengkulu Tengah
        </header>
        <div class="panel-body" style="border-top: 1px solid #eee; padding:15px; background:white;">
            <div class="row" style="margin-right:-15px; margin-left:-15px;">
                <div class="col-md-12">
                    <div class="alert alert-primary alert-block text-center" id="keterangan">

                        <strong class="text-uppercase"><i class="fa fa-info-circle"></i>&nbsp;Perhatian: </strong><br> Silahkan tambahkan usulan kegiatan anda, harap melengkapi data terlebih dahulu agar proses pengajuan usulan tidak ada masalah kedepannya !!
                    </div>
                </div>
                <div class="row">
                    <form action="{{ route('guru.pelatihan.post') }}" enctype="multipart/form-data" method="POST">
                        {{ csrf_field() }} {{ method_field('POST') }}
                        <div class="col-md-12">
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Jenis Diklat</label>
                                <select name="jendiklat" class="form-control" id="">
                                    <option disabled>-- pilih Jenis Diklat --</option>
                                    @foreach ($jendiklat as $jendiklat)
                                        <option value="{{ $jendiklat->jendikkd }}">{{ $jendiklat->jendiknama }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('jendiklat'))
                                    <small class="form-text text-danger">{{ $errors->first('jendiklat') }}</small>
                                @endif
                            </div>
                               <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Nama Diklat</label>
                                <input type="text" name="pltNmdiklat2" class="tags form-control @error('pltNmdiklat2') is-invalid @enderror" />
                                @if ($errors->has('pltNmdiklat2'))
                                    <small class="form-text text-danger">{{ $errors->first('pltNmdiklat2') }}</small>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Tanggal Mulai</label>
                                <input type="date" name="pltTglmulai" class="tags form-control @error('pltTglmulai') is-invalid @enderror" />
                                @if ($errors->has('pltTglmulai'))
                                    <small class="form-text text-danger">{{ $errors->first('pltTglmulai') }}</small>
                                @endif
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Tanggal Selesai</label>
                                <input type="date" name="pltTglakhir" class="tags form-control @error('pltTglakhir') is-invalid @enderror" />
                                @if ($errors->has('pltTglakhir'))
                                    <small class="form-text text-danger">{{ $errors->first('pltTglakhir') }}</small>
                                @endif
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Tempat</label>
                                <input type="text" name="pltTempat" class="tags form-control @error('pltTempat') is-invalid @enderror" />
                                @if ($errors->has('pltTempat'))
                                    <small class="form-text text-danger">{{ $errors->first('pltTempat') }}</small>
                                @endif
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Tahun</label>
                                <input type="number" name="pltThnsertifikat" class="tags form-control @error('pltThnsertifikat') is-invalid @enderror" />
                                @if ($errors->has('pltThnsertifikat'))
                                    <small class="form-text text-danger">{{ $errors->first('pltThnsertifikat') }}</small>
                                @endif
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Nomor Sertifikat</label>
                                <input type="text" name="pltnosertifikat" class="tags form-control @error('pltnosertifikat') is-invalid @enderror" />
                                @if ($errors->has('pltnosertifikat'))
                                    <small class="form-text text-danger">{{ $errors->first('pltnosertifikat') }}</small>
                                @endif
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Upload Sertifikat Kepangkatan : <a class="text-danger">Harap masukan file DOC/PDF. Max : 2MB</a></label>
                                <input type="file" name="pltDokumen" id="pltDokumen" class="form-control @error('pltDokumen') is-invalid @enderror" style="padding-bottom:30px;">
                                @if ($errors->has('pltDokumen'))
                                    <small class="form-text text-danger">{{ $errors->first('pltDokumen') }}</small>
                                @endif
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
