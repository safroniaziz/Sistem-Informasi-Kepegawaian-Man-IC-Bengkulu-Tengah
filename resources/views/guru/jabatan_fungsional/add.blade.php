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
                    <form action="{{ route('guru.jabatan_fungsional.post') }}" enctype="multipart/form-data" method="POST">
                        {{ csrf_field() }} {{ method_field('POST') }}
                        <div class="col-md-12">
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Jenis Jabatan</label>
                                <input type="text" name="jfKdJenisjab" class="tags form-control @error('jfKdJenisjab') is-invalid @enderror" />
                                <div>
                                    @if ($errors->has('jfKdJenisjab'))
                                        <small class="form-text text-danger">{{ $errors->first('jfKdJenisjab') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Jabatan</label>
                                <select name="jfKdjab" class="form-control @error('jfKdjab') is-invalid @enderror">
                                    <option disabled>-- pilih Jabatan --</option>
                                    @foreach ($jabatan as $jabatan)
                                        <option value="{{ $jabatan->jabKdJab }}">{{ $jabatan->jabNama }}</option>
                                    @endforeach
                                </select>
                                <div>
                                    @if ($errors->has('jfKdjab'))
                                        <small class="form-text text-danger">{{ $errors->first('jfKdjab') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Tamatan</label>
                                <input type="date" name="jfTmtjab" class="tags form-control @error('jfTmtjab') is-invalid @enderror" />
                                <div>
                                    @if ($errors->has('jfTmtjab'))
                                        <small class="form-text text-danger">{{ $errors->first('jfTmtjab') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Nomor SK</label>
                                <input type="text" name="jfNoSk" class="tags form-control @error('jfNoSk') is-invalid @enderror" />
                                <div>
                                    @if ($errors->has('jfNoSk'))
                                        <small class="form-text text-danger">{{ $errors->first('jfNoSk') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Tanggal SK</label>
                                <input type="date" name="jfTglSk" class="tags form-control @error('jfTglSk') is-invalid @enderror" />
                                <div>
                                    @if ($errors->has('jfTglSk'))
                                        <small class="form-text text-danger">{{ $errors->first('jfTglSk') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Pejabat Tertanda</label>
                                <input type="text" name="jfPejabat" class="tags form-control @error('jfPejabat') is-invalid @enderror" />
                                <div>
                                    @if ($errors->has('jfPejabat'))
                                        <small class="form-text text-danger">{{ $errors->first('jfPejabat') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Bidang Ilmu</label>
                                <select name="jfKdunit" class="form-control" id="">
                                    <option disabled>-- pilih bidang ilmu --</option>
                                    @foreach ($bidangilmu as $bidangilmu)
                                        <option value="{{ $bidangilmu->mapKdMapel }}">{{ $bidangilmu->mapNmMapel }}</option>
                                    @endforeach
                                </select>
                                <div>
                                    @if ($errors->has('jfKdunit'))
                                        <small class="form-text text-danger">{{ $errors->first('jfKdunit') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Upload Dokumen : <a class="text-danger">Harap masukan file DOC/PDF. Max : 2MB</a></label>
                                <input type="file" name="jfDokumen" id="jfDokumen" class="form-control @error('jfDokumen') is-invalid @enderror" style="padding-bottom:30px;">
                                <div>
                                    @if ($errors->has('jfDokumen'))
                                        <small class="form-text text-danger">{{ $errors->first('jfDokumen') }}</small>
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
