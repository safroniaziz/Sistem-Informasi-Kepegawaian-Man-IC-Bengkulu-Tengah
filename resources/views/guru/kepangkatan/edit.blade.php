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
                    <form action="{{ route('guru.kepangkatan.update',[$data->goNoUrt]) }}" enctype="multipart/form-data" method="POST">
                        {{ csrf_field() }} {{ method_field('PATCH') }}
                        <div class="col-md-12">
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Golongan / Ruang</label>
                                <select name="goGol" class="form-control @error('goGol') is-invalid @enderror">
                                    <option disabled>-- pilih golongan --</option>
                                    <option {{ $data->pendNmSekol == "2A" ? 'selected' : '' }} value="2A">2A</option>
                                    <option {{ $data->pendNmSekol == "2B" ? 'selected' : '' }} value="2B">2B</option>
                                    <option {{ $data->pendNmSekol == "2C" ? 'selected' : '' }} value="2C">2C</option>
                                    <option {{ $data->pendNmSekol == "2D" ? 'selected' : '' }} value="2D">2D</option>
                                    <option disabled>----</option>
                                    <option {{ $data->pendNmSekol == "3A" ? 'selected' : '' }} value="3A">3A</option>
                                    <option {{ $data->pendNmSekol == "3B" ? 'selected' : '' }} value="3B">3B</option>
                                    <option {{ $data->pendNmSekol == "3C" ? 'selected' : '' }} value="3C">3C</option>
                                    <option {{ $data->pendNmSekol == "3D" ? 'selected' : '' }} value="3D">3D</option>
                                    <option disabled>----</option>
                                    <option {{ $data->pendNmSekol == "4A" ? 'selected' : '' }} value="4A">4A</option>
                                    <option {{ $data->pendNmSekol == "4B" ? 'selected' : '' }} value="4B">4B</option>
                                    <option {{ $data->pendNmSekol == "4C" ? 'selected' : '' }} value="4C">4C</option>
                                    <option {{ $data->pendNmSekol == "4D" ? 'selected' : '' }} value="4D">4D</option>
                                </select>
                                <div>
                                    @if ($errors->has('goGol'))
                                        <small class="form-text text-danger">{{ $errors->first('goGol') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Tamatan Golongan</label>
                                <input type="date" value="{{ $data->goTmtGol }}" name="goTmtGol" class="tags form-control @error('goTmtGol') is-invalid @enderror" />
                                <div>
                                    @if ($errors->has('goTmtGol'))
                                        <small class="form-text text-danger">{{ $errors->first('goTmtGol') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Nomor SK</label>
                                <input type="text" value="{{ $data->goNoSk }}" name="goNoSk" class="tags form-control @error('goNoSk') is-invalid @enderror" />
                                <div>
                                    @if ($errors->has('goNoSk'))
                                        <small class="form-text text-danger">{{ $errors->first('goNoSk') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Tanggal SK</label>
                                <input type="date" value="{{ $data->goTglSk }}" name="goTglSk" class="tags form-control @error('goTglSk') is-invalid @enderror" />
                                <div>
                                    @if ($errors->has('goTglSk'))
                                        <small class="form-text text-danger">{{ $errors->first('goTglSk') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Masa Kerja Gol Tahun</label>
                                <input type="text" value="{{ $data->goMaskerThn }}" name="goMaskerThn" class="tags form-control @error('goMaskerThn') is-invalid @enderror" />
                                <div>
                                    @if ($errors->has('goMaskerThn'))
                                        <small class="form-text text-danger">{{ $errors->first('goMaskerThn') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Masa Kerja Gol Bulan</label>
                                <input type="text" value="{{ $data->goMaskerBln }}" name="goMaskerBln" class="tags form-control @error('goMaskerBln') is-invalid @enderror" />
                                <div>
                                    @if ($errors->has('goMaskerBln'))
                                        <small class="form-text text-danger">{{ $errors->first('goMaskerBln') }}</small>
                                    @endif
                                </div>
                            </div>

                            {{--  <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Gaji Pokok</label>
                                <input type="text" value="{{ $data->goGapok }}" name="goGapok" class="tags form-control @error('goGapok') is-invalid @enderror" />
                                <div>
                                    @if ($errors->has('goGapok'))
                                        <small class="form-text text-danger">{{ $errors->first('goGapok') }}</small>
                                    @endif
                                </div>
                            </div>  --}}

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
