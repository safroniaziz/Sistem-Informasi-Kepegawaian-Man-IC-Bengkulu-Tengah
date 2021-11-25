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
                    <form action="{{ route('guru.personal.post') }}" enctype="multipart/form-data" method="POST">
                        {{ csrf_field() }} {{ method_field('POST') }}
                        <div class="col-md-12">
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">NIP</label>
                                <input type="text" name="pegNip" class="tags form-control @error('pegNip') is-invalid @enderror" />
                                @if ($errors->has('pegNip'))
                                    <small class="form-text text-danger">{{ $errors->first('pegNip') }}</small>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Nama</label>
                                <input type="text" name="pegNama" class="tags form-control @error('pegNama') is-invalid @enderror" />
                                @if ($errors->has('pegNama'))
                                    <small class="form-text text-danger">{{ $errors->first('pegNama') }}</small>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Gelar Depan</label>
                                <input type="text" name="pegGlrDpn" class="tags form-control @error('pegGlrDpn') is-invalid @enderror" />
                                @if ($errors->has('pegGlrDpn'))
                                    <small class="form-text text-danger">{{ $errors->first('pegGlrDpn') }}</small>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Gelar Belakang</label>
                                <input type="text" name="pegGlrBlg" class="tags form-control @error('pegGlrBlg') is-invalid @enderror" />
                                @if ($errors->has('pegGlrBlg'))
                                    <small class="form-text text-danger">{{ $errors->first('pegGlrBlg') }}</small>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Tempat Lahir</label>
                                <input type="text" name="pegTpLhr" class="tags form-control @error('pegTpLhr') is-invalid @enderror" />
                                @if ($errors->has('pegTpLhr'))
                                    <small class="form-text text-danger">{{ $errors->first('pegTpLhr') }}</small>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Tanggal Lahir</label>
                                <input type="date" name="pegTglLhr" class="tags form-control @error('pegTglLhr') is-invalid @enderror" />
                                @if ($errors->has('pegTglLhr'))
                                    <small class="form-text text-danger">{{ $errors->first('pegTglLhr') }}</small>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Jenis Kelamin</label>
                                <select name="pegJenkel" class="form-control">
                                    <option disabled>-- pilih Jenis Kelamin --</option>
                                    <option value="L">L</option>
                                    <option value="P">P</option>
                                 
                                </select>
                                @if ($errors->has('pegJenkel'))
                                    <small class="form-text text-danger">{{ $errors->first('pegJenkel') }}</small>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Status Perkawinan</label>
                                <select name="pdKetKawin" class="form-control" id="">
                                    <option disabled>-- pilih Status Perkawinan --</option>
                                    @foreach ($kawin as $kawin)
                                        <option value="{{ $kawin->KODE }}">{{ $kawin->KET }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('pdKetKawin'))
                                    <small class="form-text text-danger">{{ $errors->first('pdKetKawin') }}</small>
                                @endif
                            </div>
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
                                <label for="exampleInputEmail1">Golongan / Ruang</label>
                                <select name="golongan" class="form-control">
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
                                @if ($errors->has('golongan'))
                                    <small class="form-text text-danger">{{ $errors->first('golongan') }}</small>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">TMT Golongan</label>
                                <input type="text" name="tmt_golongan" class="tags form-control @error('tmt_golongan') is-invalid @enderror" />
                                @if ($errors->has('tmt_golongan'))
                                    <small class="form-text text-danger">{{ $errors->first('tmt_golongan') }}</small>
                                @endif
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Nomor SK</label>
                                <input type="text" name="nomor_sk" class="tags form-control @error('nomor_sk') is-invalid @enderror" />
                                @if ($errors->has('nomor_sk'))
                                    <small class="form-text text-danger">{{ $errors->first('nomor_sk') }}</small>
                                @endif
                            </div>

                           

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Masa Kerja Gol</label>
                                <input type="text" name="masa_kerja_gol" class="tags form-control @error('masa_kerja_gol') is-invalid @enderror" />
                                @if ($errors->has('masa_kerja_gol'))
                                    <small class="form-text text-danger">{{ $errors->first('masa_kerja_gol') }}</small>
                                @endif
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Jenis Jabatan</label>
                                <input type="text" name="jfKdJenisjab" class="tags form-control @error('jfKdJenisjab') is-invalid @enderror" />
                                @if ($errors->has('jfKdJenisjab'))
                                    <small class="form-text text-danger">{{ $errors->first('jfKdJenisjab') }}</small>
                                @endif
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Jabatan</label>
                                <select name="jfKdjab" class="form-control" id="">
                                    <option disabled>-- pilih Jabatan --</option>
                                    @foreach ($jabatan as $jabatan)
                                        <option value="{{ $jabatan->jabKdJab }}">{{ $jabatan->jabNama }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('jfKdjab'))
                                    <small class="form-text text-danger">{{ $errors->first('jfKdjab') }}</small>
                                @endif
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">TMT Jabatan</label>
                                <input type="text" name="jfTmtjab" class="tags form-control @error('jfTmtjab') is-invalid @enderror" />
                                @if ($errors->has('jfTmtjab'))
                                    <small class="form-text text-danger">{{ $errors->first('jfTmtjab') }}</small>
                                @endif
                            </div>

                          
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Tugas Tambahan</label>
                                <input type="text" name="jfKdJenisjab" class="tags form-control @error('jfKdJenisjab') is-invalid @enderror" />
                                @if ($errors->has('jfKdJenisjab'))
                                    <small class="form-text text-danger">{{ $errors->first('jfKdJenisjab') }}</small>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">TMT Tugas Tambahan</label>
                                <input type="text" name="jfKdjab" class="tags form-control @error('jfKdjab') is-invalid @enderror" />
                                @if ($errors->has('jfKdjab'))
                                    <small class="form-text text-danger">{{ $errors->first('jfKdjab') }}</small>
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