@php
    use App\Models\KlasifikasiBerkas;
@endphp
@extends('layouts.layout')
@section('title', 'Manajemen Data Personal')
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
@section('content')
    <section class="panel" style="margin-bottom:20px;">
        <header class="panel-heading" style="color: #ffffff;background-color: #074071;border-color: #fff000;border-image: none;border-style: solid solid none;border-width: 4px 0px 0;border-radius: 0;font-size: 14px;font-weight: 700;padding: 15px;">
            <i class="fa fa-home"></i>&nbsp;Sistem Informasi Kepegawaian MAN IC Bengkulu Tengah
        </header>
        <div class="panel-body" style="border-top: 1px solid #eee; padding:15px; background:white;">
            <div class="row" style="margin-right:-15px; margin-left:-15px;">
                <div class="col-md-12">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>Berhasil :</strong>{{ $message }}
                        </div>
                        @elseif ($message = Session::get('error'))
                            <div class="alert alert-danger alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>Gagal :</strong>{{ $message }}
                            </div>
                            @else
                            <div class="alert alert-success alert-block" id="keterangan">
                                <strong><i class="fa fa-info-circle"></i>&nbsp;Perhatian: </strong> Berikut semua berkas berkas yang sudah diupload oleh operator !!
                            </div>
                    @endif
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <form action="" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }} {{ method_field("PATCH") }}
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">NIP</label>
                                <input type="text" name="pegNip" value="{{ $data->pegNip }}" disabled class="tags form-control @error('pegNip') is-invalid @enderror" />
                                @if ($errors->has('pegNip'))
                                    <small class="form-text text-danger">{{ $errors->first('pegNip') }}</small>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Nama</label>
                                <input type="text" name="pegNama" value="{{ $data->pegNama }}" disabled class="tags form-control @error('pegNama') is-invalid @enderror" />
                                @if ($errors->has('pegNama'))
                                    <small class="form-text text-danger">{{ $errors->first('pegNama') }}</small>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Gelar Depan</label>
                                <input type="text" name="pegGlrDpn" value="{{ $data->pegGlrDpn }}" disabled class="tags form-control @error('pegGlrDpn') is-invalid @enderror" />
                                @if ($errors->has('pegGlrDpn'))
                                    <small class="form-text text-danger">{{ $errors->first('pegGlrDpn') }}</small>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Gelar Belakang</label>
                                <input type="text" name="pegGlrBlg" value="{{ $data->pegGlrBlg }}" disabled class="tags form-control @error('pegGlrBlg') is-invalid @enderror" />
                                @if ($errors->has('pegGlrBlg'))
                                    <small class="form-text text-danger">{{ $errors->first('pegGlrBlg') }}</small>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Tempat Lahir</label>
                                <input type="text" name="pegTpLhr" value="{{ $data->pegTpLhr }}" disabled class="tags form-control @error('pegTpLhr') is-invalid @enderror" />
                                @if ($errors->has('pegTpLhr'))
                                    <small class="form-text text-danger">{{ $errors->first('pegTpLhr') }}</small>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Tanggal Lahir</label>
                                <input type="date" name="pegTglLhr" disabled class="tags form-control @error('pegTglLhr') is-invalid @enderror" />
                                @if ($errors->has('pegTglLhr'))
                                    <small class="form-text text-danger">{{ $errors->first('pegTglLhr') }}</small>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Jenis Kelamin</label>
                                <select name="pegJenkel" disabled class="form-control">
                                    <option selected disabled>-- pilih Jenis Kelamin --</option>
                                    <option {{ $data->pegJenkel == "L" ? 'selected' : '' }} value="L">Laki-Laki</option>
                                    <option {{ $data->pegJenkel == "P" ? 'selected' : '' }} value="P">Perempuan</option>
                                    
                                </select>
                                @if ($errors->has('pegJenkel'))
                                    <small class="form-text text-danger">{{ $errors->first('pegJenkel') }}</small>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Status Perkawinan</label>
                                <select name="pdKetKawin" class="form-control" id="">
                                    <option selected disabled>-- pilih Status Perkawinan --</option>
                                    @foreach ($kawin as $kawin)
                                        <option {{ $data->pegKetkawin == $kawin->KODE ? 'selected' : '' }} value="{{ $kawin->KODE }}">{{ $kawin->KET }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('pdKetKawin'))
                                    <small class="form-text text-danger">{{ $errors->first('pdKetKawin') }}</small>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">CPNS Terhitung Mulai Tanggal</label>
                                <input type="text" name="pendNmSekol" class="tags form-control @error('pendNmSekol') is-invalid @enderror" />
                                @if ($errors->has('pendNmSekol'))
                                    <small class="form-text text-danger">{{ $errors->first('pendNmSekol') }}</small>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Pns Terhitung Mulai Tanggal</label>
                                <input type="text" name="pendNmSekol" class="tags form-control @error('pendNmSekol') is-invalid @enderror" />
                                @if ($errors->has('pendNmSekol'))
                                    <small class="form-text text-danger">{{ $errors->first('pendNmSekol') }}</small>
                                @endif
                            </div>

                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Golongan / Ruang</label>
                                <select name="golongan" class="form-control">
                                    <option selected disabled>-- pilih golongan --</option>
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
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">TMT Golongan</label>
                                <input type="text" name="tmt_golongan" class="tags form-control @error('tmt_golongan') is-invalid @enderror" />
                                @if ($errors->has('tmt_golongan'))
                                    <small class="form-text text-danger">{{ $errors->first('tmt_golongan') }}</small>
                                @endif
                            </div>

                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Masa Kerja Tahun</label>
                                <input type="text" name="nomor_sk" class="tags form-control @error('nomor_sk') is-invalid @enderror" />
                                @if ($errors->has('nomor_sk'))
                                    <small class="form-text text-danger">{{ $errors->first('nomor_sk') }}</small>
                                @endif
                            </div>

                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Masa Kerja Bulan</label>
                                <input type="text" name="masa_kerja_gol" class="tags form-control @error('masa_kerja_gol') is-invalid @enderror" />
                                @if ($errors->has('masa_kerja_gol'))
                                    <small class="form-text text-danger">{{ $errors->first('masa_kerja_gol') }}</small>
                                @endif
                            </div>

                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Pendidikan Terakhir</label>
                                <select name="pegPendAkhir" class="form-control @error('pegPendAkhir') is-invalid @enderror" id="">
                                    <option selected disabled>-- pilih pendidikan terakhir --</option>
                                    <option value="SD">SD</option>
                                    <option value="SMP">SMP</option>
                                    <option value="SMA">SMA</option>
                                    <option value="D1">D1</option>
                                    <option value="D2">D2</option>
                                    <option value="D3">D3</option>
                                    <option value="S1">S1</option>
                                    <option value="S2">S2</option>
                                    <option value="S3">S3</option>
                                </select>
                                @if ($errors->has('pegPendAkhir'))
                                    <small class="form-text text-danger">{{ $errors->first('pegPendAkhir') }}</small>
                                @endif
                            </div>

                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Tahun Lulus</label>
                                <input type="text" name="pegThnLulus" class="tags form-control @error('pegThnLulus') is-invalid @enderror" />
                                @if ($errors->has('pegThnLulus'))
                                    <small class="form-text text-danger">{{ $errors->first('pegThnLulus') }}</small>
                                @endif
                            </div>

                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Jurusan</label>
                                <input type="text" name="pegJurusan" class="tags form-control @error('pegJurusan') is-invalid @enderror" />
                                @if ($errors->has('pegJurusan'))
                                    <small class="form-text text-danger">{{ $errors->first('pegJurusan') }}</small>
                                @endif
                            </div>

                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Nama Sekolah/Universitas</label>
                                <input type="text" name="pegTempat" class="tags form-control @error('pegTempat') is-invalid @enderror" />
                                @if ($errors->has('pegTempat'))
                                    <small class="form-text text-danger">{{ $errors->first('pegTempat') }}</small>
                                @endif
                            </div>

                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Agama</label>
                                <select name="pegAgama" class="form-control @error('pegAgama') is-invalid @enderror" id="">
                                    <option selected disabled>-- pilih agama --</option>
                                    @foreach ($agama as $agama)
                                        <option value="{{ $agama->KODE }}">{{ $agama->NAMA }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('pegAgama'))
                                    <small class="form-text text-danger">{{ $errors->first('pegAgama') }}</small>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Status Pegawai</label>
                                <select name="pegStapeg" class="form-control @error('pegStapeg') is-invalid @enderror" id="">
                                    <option selected disabled>-- pilih status pegawai --</option>
                                    @foreach ($stapeg as $stapeg)
                                        <option value="{{ $stapeg->KODE }}">{{ $stapeg->STAPEG }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('pegStapeg'))
                                    <small class="form-text text-danger">{{ $errors->first('pegStapeg') }}</small>
                                @endif
                            </div>

                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Kedudukan Hukum</label>
                                <select name="pegStapeg" class="form-control @error('pegStapeg') is-invalid @enderror" id="">
                                    <option selected disabled>-- pilih keduudkan hukum --</option>
                                    @foreach ($kedkum as $kedkum)
                                        <option value="{{ $kedkum->kedIdHukum }}">{{ $kedkum->kedNmHukum }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('pegStapeg'))
                                    <small class="form-text text-danger">{{ $errors->first('pegStapeg') }}</small>
                                @endif
                            </div>

                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Jenis Pegawai</label>
                                <select name="pegStapeg" class="form-control @error('pegStapeg') is-invalid @enderror" id="">
                                    <option selected disabled>-- pilih jenis pegawai --</option>
                                    <option value="Guru">Guru</option>
                                    <option value="Karyawan">Karyawan</option>
                                </select>
                                @if ($errors->has('pegStapeg'))
                                    <small class="form-text text-danger">{{ $errors->first('pegStapeg') }}</small>
                                @endif
                            </div>

                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Jabatan</label>
                                <select name="pegStapeg" class="form-control @error('pegStapeg') is-invalid @enderror" id="">
                                    <option selected disabled>-- pilih jabatan --</option>
                                    @foreach ($jabatan as $jabatan)
                                        <option value="{{ $jabatan->jabKdJab }}">{{ $jabatan->jabNama }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('pegStapeg'))
                                    <small class="form-text text-danger">{{ $errors->first('pegStapeg') }}</small>
                                @endif
                            </div>

                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">TMT Jurusan</label>
                                <input type="text" name="pegTmtJab" class="tags form-control @error('pegTmtJab') is-invalid @enderror" />
                                @if ($errors->has('pegTmtJab'))
                                    <small class="form-text text-danger">{{ $errors->first('pegTmtJab') }}</small>
                                @endif
                            </div>

                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Nomor Ijazah</label>
                                <input type="text" name="pendNoIjazah" class="tags form-control @error('pendNoIjazah') is-invalid @enderror" />
                                @if ($errors->has('pendNoIjazah'))
                                    <small class="form-text text-danger">{{ $errors->first('pendNoIjazah') }}</small>
                                @endif
                            </div>

                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Tanggal Lulus</label>
                                <input type="date" name="tanggal_lulus" class="tags form-control @error('tanggal_lulus') is-invalid @enderror" />
                                @if ($errors->has('tanggal_lulus'))
                                    <small class="form-text text-danger">{{ $errors->first('tanggal_lulus') }}</small>
                                @endif
                            </div>

                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Jenis Jabatan</label>
                                <input type="text" name="jfKdJenisjab" class="tags form-control @error('jfKdJenisjab') is-invalid @enderror" />
                                @if ($errors->has('jfKdJenisjab'))
                                    <small class="form-text text-danger">{{ $errors->first('jfKdJenisjab') }}</small>
                                @endif
                            </div>

                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">TMT Jabatan</label>
                                <input type="text" name="jfTmtjab" class="tags form-control @error('jfTmtjab') is-invalid @enderror" />
                                @if ($errors->has('jfTmtjab'))
                                    <small class="form-text text-danger">{{ $errors->first('jfTmtjab') }}</small>
                                @endif
                            </div>
                            
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Tugas Tambahan</label>
                                <input type="text" name="jfKdJenisjab" class="tags form-control @error('jfKdJenisjab') is-invalid @enderror" />
                                @if ($errors->has('jfKdJenisjab'))
                                    <small class="form-text text-danger">{{ $errors->first('jfKdJenisjab') }}</small>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">TMT Tugas Tambahan</label>
                                <input type="text" name="jfKdjab" class="tags form-control @error('jfKdjab') is-invalid @enderror" />
                                @if ($errors->has('jfKdjab'))
                                    <small class="form-text text-danger">{{ $errors->first('jfKdjab') }}</small>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

