@extends('layouts.layout')
@section('title', 'Edit Data Pendidikan')
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
                    <form action="{{ route('guru.pendidikan.update',[$data->pendNip]) }}" enctype="multipart/form-data" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }} {{ method_field('PATCH') }}
                        <div class="col-md-12">
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Tingkat Pendidikan</label>
                                <select name="pendNmSekol" class="form-control @error('pendNmSekol') is-invalid @enderror">
                                    <option disabled>-- pilih golongan --</option>
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
                                    @if ($errors->has('pendNmSekol'))
                                        <small class="form-text text-danger">{{ $errors->first('pendNmSekol') }}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Nomor Ijazah</label>
                                <input type="text" value="{{ $data->pendNoIjazah }}" name="pendNoIjazah" class="tags form-control @error('pendNoIjazah') is-invalid @enderror" />
                                <div>
                                    @if ($errors->has('pendNoIjazah'))
                                        <small class="form-text text-danger">{{ $errors->first('pendNoIjazah') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Tahun Lulus</label>
                                <input type="text" name="pendThnLls" value="{{ $data->pendThnLls }}" class="tags form-control @error('pendThnLls') is-invalid @enderror" />
                                <div>
                                    @if ($errors->has('pendThnLls'))
                                        <small class="form-text text-danger">{{ $errors->first('pendThnLls') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Tanggal Lulus</label>
                                <input type="date" name="pendTglIjazah" value="{{ $data->pendTglIjazah }}" class="tags form-control @error('pendTglIjazah') is-invalid @enderror" />
                                <div>
                                    @if ($errors->has('pendTglIjazah'))
                                        <small class="form-text text-danger">{{ $errors->first('pendTglIjazah') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Tempat Sekolah</label>
                                <input type="text" name="pendTempat" value="{{ $data->pendTempat }}" class="tags form-control @error('pendTempat') is-invalid @enderror" />
                                <div>
                                    @if ($errors->has('pendTempat'))
                                        <small class="form-text text-danger">{{ $errors->first('pendTempat') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Jurusan</label>
                                <input type="text" name="pendJurusan" value="{{ $data->pendJurusan }}" class="tags form-control @error('pendJurusan') is-invalid @enderror" />
                                <div>
                                    @if ($errors->has('pendJurusan'))
                                        <small class="form-text text-danger">{{ $errors->first('pendJurusan') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Upload Ijazah : <a class="text-danger">File Lama : {{ $data->pendDokumen }}</a></label>
                                <input type="file" name="pendDokumen" id="pendDokumen" class="form-control" style="padding-bottom:30px;">
                                <div>
                                    @if ($errors->has('pendDokumen'))
                                        <small class="form-text text-danger">{{ $errors->first('pendDokumen') }}</small>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 text-center">
                            <hr style="width: 50%" class="mt-0">
                            <a href="{{ route('guru.pendidikan') }}" class="btn btn-warning btn-sm" style="color: white"><i class="fa fa-arrow-left"></i>&nbsp; Kembali</a>
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
