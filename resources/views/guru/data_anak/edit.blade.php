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
                    <form action="{{ route('guru.data_anak.update',[$data->akNoUrt]) }}" enctype="multipart/form-data" method="POST">
                        {{ csrf_field() }} {{ method_field('PATCH') }}

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Nama</label>
                                <input type="text" value="{{ $data->akNama }}" name="akNama" class="tags form-control @error('akNama') is-invalid @enderror" />
                                <div>
                                    @if ($errors->has('akNama'))
                                        <small class="form-text text-danger">{{ $errors->first('akNama') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Status Anak</label>
                                <select name="akStatus" class="form-control">
                                    <option disabled>-- pilih Status Anak --</option>
                                    <option {{ $data->pendNmSekol == "AK" ? 'selected' : '' }} value="AK">Anak Kandung</option>
                                    <option {{ $data->pendNmSekol == "AA" ? 'selected' : '' }} value="AA">Anak Angkat</option>
                                    <option {{ $data->pendNmSekol == "AT" ? 'selected' : '' }} value="AT">Anak Tiri</option>
                                </select>
                                <div>
                                    @if ($errors->has('akStatus'))
                                        <small class="form-text text-danger">{{ $errors->first('akStatus') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Jenis Kelamin</label>
                                <select name="akJenkel" class="form-control">
                                    <option disabled>-- pilih Jenis Kelamin --</option>
                                    <option {{ $data->pendNmSekol == "L" ? 'selected' : '' }} value="L">Laki-Laki</option>
                                    <option {{ $data->pendNmSekol == "P" ? 'selected' : '' }} value="P">Perempuai</option>
                                </select>
                                <div>
                                    @if ($errors->has('akJenkel'))
                                        <small class="form-text text-danger">{{ $errors->first('akJenkel') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Tempat Lahir</label>
                                <input type="text" value="{{ $data->akTpLhr }}" name="akTpLhr" class="tags form-control @error('akTpLhr') is-invalid @enderror" />
                                <div>
                                    @if ($errors->has('akTpLhr'))
                                        <small class="form-text text-danger">{{ $errors->first('akTpLhr') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Tanggal Lahir</label>
                                <input type="date" value="{{ $data->akTglLhr }}" name="akTglLhr" class="tags form-control @error('akTglLhr') is-invalid @enderror" />
                                <div>
                                    @if ($errors->has('akTglLhr'))
                                        <small class="form-text text-danger">{{ $errors->first('akTglLhr') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Status Pendidikan</label>
                                <input type="text" value="{{ $data->akStatusPend }}" name="akStatusPend" class="tags form-control @error('akStatusPend') is-invalid @enderror" />
                                <div>
                                    @if ($errors->has('akStatusPend'))
                                        <small class="form-text text-danger">{{ $errors->first('akStatusPend') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Pendidikan Terakhir</label>
                                <select name="akPendAkhir" class="form-control">
                                    <option disabled>-- pilih Pendidikan Terakhir --</option>
                                    <option {{ $data->pendNmSekol == "SD" ? 'selected' : '' }} value="SD">SD</option>
                                    <option {{ $data->pendNmSekol == "SLTP" ? 'selected' : '' }} value="SLTP">SLTP</option>
                                    <option {{ $data->pendNmSekol == "SLTA" ? 'selected' : '' }} value="SLTA">SLTA Sederajat</option>
                                    <option {{ $data->pendNmSekol == "D2" ? 'selected' : '' }} value="D2">D2</option>
                                    <option {{ $data->pendNmSekol == "D3" ? 'selected' : '' }} value="D3">D3</option>
                                    <option {{ $data->pendNmSekol == "S1" ? 'selected' : '' }} value="S1">S1</option>
                                    <option {{ $data->pendNmSekol == "S2" ? 'selected' : '' }} value="S2">S2</option>
                                    <option {{ $data->pendNmSekol == "S3" ? 'selected' : '' }} value="S3">S3</option>
                                </select>
                                <div>
                                    @if ($errors->has('akPendAkhir'))
                                        <small class="form-text text-danger">{{ $errors->first('akPendAkhir') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Alasan Tidak Sekolah</label>
                                <input type="text" value="{{ $data->akAlsanTdkSekolah }}" name="akAlsanTdkSekolah" class="tags form-control @error('akAlsanTdkSekolah') is-invalid @enderror" />
                                <div>
                                    @if ($errors->has('akAlsanTdkSekolah'))
                                        <small class="form-text text-danger">{{ $errors->first('akAlsanTdkSekolah') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Pekerjaan</label>
                                <select name="akKerjaan" class="form-control">
                                    <option disabled>-- pilih pekerjaan --</option>
                                    <option {{ $data->pendNmSekol == "PNS" ? 'selected' : '' }} value="PNS">PNS</option>
                                    <option {{ $data->pendNmSekol == "PEG NON PNS" ? 'selected' : '' }} value="PEG NON PNS">Peg Non PNS</option>
                                    <option {{ $data->pendNmSekol == "SWASTA" ? 'selected' : '' }} value="SWASTA">Swasta</option>
                                </select>
                                <div>
                                    @if ($errors->has('akKerjaan'))
                                        <small class="form-text text-danger">{{ $errors->first('akKerjaan') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">NIP</label>
                                <input type="text" value="{{ $data->akNip }}" name="akNip" class="tags form-control @error('akNip') is-invalid @enderror" />
                                <div>
                                    @if ($errors->has('akNip'))
                                        <small class="form-text text-danger">{{ $errors->first('akNip') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">BPJS No</label>
                                <input type="text" value="{{ $data->akNoBpjs }}" name="akNoBpjs" class="tags form-control @error('akNoBpjs') is-invalid @enderror" />
                                <div>
                                    @if ($errors->has('akNoBpjs'))
                                        <small class="form-text text-danger">{{ $errors->first('akNoBpjs') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Nama Ibu</label>
                                <input type="text" value="{{ $data->akIbu }}" name="akIbu" class="tags form-control @error('akIbu') is-invalid @enderror" />
                                <div>
                                    @if ($errors->has('akIbu'))
                                        <small class="form-text text-danger">{{ $errors->first('akIbu') }}</small>
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
