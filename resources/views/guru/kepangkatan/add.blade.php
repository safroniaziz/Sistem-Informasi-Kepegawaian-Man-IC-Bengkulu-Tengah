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
                    <form action="{{ route('guru.kepangkatan.post') }}" enctype="multipart/form-data" method="POST">
                        {{ csrf_field() }} {{ method_field('POST') }}
                        <div class="col-md-12">
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Golongan / Ruang</label>
                                <select name="goGol" class="form-control @error('goGol') is-invalid @enderror">
                                    <option disabled>-- pilih golongan --</option>
                                    <option value="2A">2A</option>
                                    <option value="2B">2B</option>
                                    <option value="2B">2C</option>
                                    <option value="2B">2D</option>
                                    <option disabled>----</option>
                                    <option value="2B">3A</option>
                                    <option value="2B">3B</option>
                                    <option value="2B">3C</option>
                                    <option value="2B">3D</option>
                                    <option disabled>----</option>
                                    <option value="2B">4A</option>
                                    <option value="2B">4B</option>
                                    <option value="2B">4C</option>
                                    <option value="2B">4D</option>
                                </select>
                                <div>
                                    @if ($errors->has('goGol'))
                                        <small class="form-text text-danger">{{ $errors->first('goGol') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Tamatan Golongan</label>
                                <input type="date" name="goTmtGol" class="tags form-control @error('goTmtGol') is-invalid @enderror" />
                                <div>
                                    @if ($errors->has('goTmtGol'))
                                        <small class="form-text text-danger">{{ $errors->first('goTmtGol') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Nomor SK</label>
                                <input type="text" name="goNoSk" class="tags form-control @error('goNoSk') is-invalid @enderror" />
                                <div>
                                    @if ($errors->has('goNoSk'))
                                        <small class="form-text text-danger">{{ $errors->first('goNoSk') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Tanggal SK</label>
                                <input type="date" name="goTglSk" class="tags form-control @error('goTglSk') is-invalid @enderror" />
                                <div>
                                    @if ($errors->has('goTglSk'))
                                        <small class="form-text text-danger">{{ $errors->first('goTglSk') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Masa Kerja Gol Tahun</label>
                                <input type="text" name="goMaskerThn" class="tags form-control @error('goMaskerThn') is-invalid @enderror" />
                                <div>
                                    @if ($errors->has('goMaskerThn'))
                                        <small class="form-text text-danger">{{ $errors->first('goMaskerThn') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Masa Kerja Gol Bulan</label>
                                <input type="text" name="goMaskerBln" class="tags form-control @error('goMaskerBln') is-invalid @enderror" />
                                <div>
                                    @if ($errors->has('goMaskerBln'))
                                        <small class="form-text text-danger">{{ $errors->first('goMaskerBln') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Gaji Pokok</label>
                                <input type="text" name="goGapok" class="tags form-control @error('goGapok') is-invalid @enderror" />
                                <div>
                                    @if ($errors->has('goGapok'))
                                        <small class="form-text text-danger">{{ $errors->first('goGapok') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">SK Kepangkatan : <a class="text-danger">Harap masukan file DOC/PDF. Max : 2MB</a></label>
                                <input type="file" name="goDokumen" id="goDokumen" class="form-control @error('goDokumen') is-invalid @enderror" style="padding-bottom:30px;">
                                @if ($errors->has('goDokumen'))
                                    <small class="form-text text-danger">{{ $errors->first('goDokumen') }}</small>
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
