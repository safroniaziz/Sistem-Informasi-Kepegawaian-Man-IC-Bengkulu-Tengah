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
                    <form action="{{ route('guru.data_anak.post') }}" enctype="multipart/form-data" method="POST">
                        {{ csrf_field() }} {{ method_field('POST') }}

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Nama</label>
                                <input type="text" name="kelNama" class="tags form-control @error('kelNama') is-invalid @enderror" />
                                @if ($errors->has('kelNama'))
                                    <small class="form-text text-danger">{{ $errors->first('kelNama') }}</small>
                                @endif
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Status Anak</label>
                                <select name="akStatus" class="form-control">
                                    <option disabled>-- pilih Status Anak --</option>
                                    <option value="AK">Anak Kandung</option>
                                    <option value="AA">Anak Angkat</option>
                                    <option value="AT">Anak Tiri</option>
                                </select>
                                @if ($errors->has('akStatus'))
                                    <small class="form-text text-danger">{{ $errors->first('akStatus') }}</small>
                                @endif
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Jenis Kelamin</label>
                                <select name="akTglLhr" class="form-control">
                                    <option disabled>-- pilih Jenis Kelamin --</option>
                                    <option value="L">Laki-Laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                                @if ($errors->has('akTglLhr'))
                                    <small class="form-text text-danger">{{ $errors->first('akTglLhr') }}</small>
                                @endif
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Tempat Lahir</label>
                                <input type="text" name="akTpLhr" class="tags form-control @error('akTpLhr') is-invalid @enderror" />
                                @if ($errors->has('akTpLhr'))
                                    <small class="form-text text-danger">{{ $errors->first('akTpLhr') }}</small>
                                @endif
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Tanggal Lahir</label>
                                <input type="date" name="akTglLhr" class="tags form-control @error('akTglLhr') is-invalid @enderror" />
                                @if ($errors->has('akTglLhr'))
                                    <small class="form-text text-danger">{{ $errors->first('akTglLhr') }}</small>
                                @endif
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Status Pendidikan</label>
                                <input type="text" name="akStatusPend" class="tags form-control @error('akStatusPend') is-invalid @enderror" />
                                @if ($errors->has('akStatusPend'))
                                    <small class="form-text text-danger">{{ $errors->first('akStatusPend') }}</small>
                                @endif
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Pendidikan Terakhir</label>
                                <select name="akPendAkhir" class="form-control">
                                    <option disabled>-- pilih Pendidikan Terakhir --</option>
                                    <option value="SD">SD</option>
                                    <option value="SLTP">SLTP</option>
                                    <option value="SLTA">SLTA Sederajat</option>
                                    <option value="D2">D2</option>
                                    <option value="D3">D3</option>
                                    <option value="S1">S1</option>
                                    <option value="S2">S2</option>
                                    <option value="S3">S3</option>
                                </select>
                                @if ($errors->has('akPendAkhir'))
                                    <small class="form-text text-danger">{{ $errors->first('akPendAkhir') }}</small>
                                @endif
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Alasan Tidak Sekolah</label>
                                <input type="text" name="akAlsanTdkSekolah" class="tags form-control @error('akAlsanTdkSekolah') is-invalid @enderror" />
                                @if ($errors->has('akAlsanTdkSekolah'))
                                    <small class="form-text text-danger">{{ $errors->first('akAlsanTdkSekolah') }}</small>
                                @endif
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Pekerjaan</label>
                                <select name="akKerjaan" class="form-control">
                                    <option disabled>-- pilih pekerjaan --</option>
                                    <option value="PNS">PNS</option>
                                    <option value="PEG NON PNS">Peg Non PNS</option>
                                    <option value="SEWASTA">Sewasta</option>
                                </select>
                                @if ($errors->has('akKerjaan'))
                                    <small class="form-text text-danger">{{ $errors->first('akKerjaan') }}</small>
                                @endif
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">NIP</label>
                                <input type="text" name="akNip" class="tags form-control @error('akNip') is-invalid @enderror" />
                                @if ($errors->has('akNip'))
                                    <small class="form-text text-danger">{{ $errors->first('akNip') }}</small>
                                @endif
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">BPJS No</label>
                                <input type="text" name="akNoBpjs" class="tags form-control @error('akNoBpjs') is-invalid @enderror" />
                                @if ($errors->has('akNoBpjs'))
                                    <small class="form-text text-danger">{{ $errors->first('akNoBpjs') }}</small>
                                @endif
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Nama Ibu</label>
                                <input type="text" name="akIbu" class="tags form-control @error('akIbu') is-invalid @enderror" />
                                @if ($errors->has('akIbu'))
                                    <small class="form-text text-danger">{{ $errors->first('akIbu') }}</small>
                                @endif
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
