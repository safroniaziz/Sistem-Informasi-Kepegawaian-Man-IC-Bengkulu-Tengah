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
                                <strong><i class="fa fa-info-circle"></i>&nbsp;Perhatian: </strong> Berikut semua data yang sudah diunggah
                            </div>
                    @endif
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('guru.personal.update',[$data->pegNip]) }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }} {{ method_field("PATCH") }}
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">NIP</label>
                                <input type="text" name="pegNip" id="pegNip" value="{{ $data->pegNip }}" disabled class="tags form-control @error('pegNip') is-invalid @enderror" />
                                @if ($errors->has('pegNip'))
                                    <small class="form-text text-danger">{{ $errors->first('pegNip') }}</small>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Nama</label>
                                <input type="text" name="pegNama" id="pegNama" value="{{ $data->pegNama }}" disabled class="tags form-control @error('pegNama') is-invalid @enderror" />
                                @if ($errors->has('pegNama'))
                                    <small class="form-text text-danger">{{ $errors->first('pegNama') }}</small>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Gelar Depan</label>
                                <input type="text" name="pegGlrDpn" id="pegGlrDpn" value="{{ $data->pegGlrDpn }}" disabled class="tags form-control @error('pegGlrDpn') is-invalid @enderror" />
                                @if ($errors->has('pegGlrDpn'))
                                    <small class="form-text text-danger">{{ $errors->first('pegGlrDpn') }}</small>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Gelar Belakang</label>
                                <input type="text" name="pegGlrBlg" id="pegGlrBlg" value="{{ $data->pegGlrBlg }}" disabled class="tags form-control @error('pegGlrBlg') is-invalid @enderror" />
                                @if ($errors->has('pegGlrBlg'))
                                    <small class="form-text text-danger">{{ $errors->first('pegGlrBlg') }}</small>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Tempat Lahir</label>
                                <input type="text" name="pegTpLhr" id="pegTpLhr" value="{{ $data->pegTpLhr }}" disabled class="tags form-control @error('pegTpLhr') is-invalid @enderror" />
                                @if ($errors->has('pegTpLhr'))
                                    <small class="form-text text-danger">{{ $errors->first('pegTpLhr') }}</small>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Tanggal Lahir</label>
                                <input type="date" name="pegTglLhr" id="pegTglLhr" value="{{ $data->pegTglLhr }}"  disabled class="tags form-control @error('pegTglLhr') is-invalid @enderror" />
                                @if ($errors->has('pegTglLhr'))
                                    <small class="form-text text-danger">{{ $errors->first('pegTglLhr') }}</small>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Jenis Kelamin</label>
                                <select name="pegJenkel" id="pegJenkel" disabled class="form-control">
                                    <option selected disabled>-- pilih Jenis Kelamin --</option>
                                    <option {{ $data->pegJenkel == "P" ? 'selected' : '' }} value="P">Perempuan</option>
                                    <option {{ $data->pegJenkel == "L" ? 'selected' : '' }} value="L">Laki-Laki</option>
                                    
                                </select>
                                @if ($errors->has('pegJenkel'))
                                    <small class="form-text text-danger">{{ $errors->first('pegJenkel') }}</small>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Status Perkawinan</label>
                                <select name="pegKetKawin" id="pegKetKawin"  value="{{ $data->pegKetkawin }}" disabled class="form-control" id="">
                                    <option selected disabled>-- pilih Status Perkawinan --</option>
                                    @foreach ($kawin as $kawin)
                                        <option {{ $data->pegKdkawin == $kawin->KODE ? 'selected' : '' }} value="{{ $kawin->KODE }}">{{ $kawin->KET }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('pegKetKawin'))
                                    <small class="form-text text-danger">{{ $errors->first('pegKetKawin') }}</small>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">CPNS Terhitung Mulai Tanggal</label>
                                <input type="date" name="pegTmtCpns" id="pegTmtCpns"  value="{{ $data->pegTmtCpns }}"  disabled class="tags form-control @error('pegTmtCpns') is-invalid @enderror" />
                                @if ($errors->has('pegTmtCpns'))
                                    <small class="form-text text-danger">{{ $errors->first('pegTmtCpns') }}</small>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Pns Terhitung Mulai Tanggal</label>
                                <input type="date" name="pegTmtPns" id="pegTmtPns" value="{{ $data->pegTmtPns }}" disabled class="tags form-control @error('pegTmtPns') is-invalid @enderror" />
                                @if ($errors->has('pegTmtPns'))
                                    <small class="form-text text-danger">{{ $errors->first('pegTmtPns') }}</small>
                                @endif
                            </div>

                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1" >Golongan / Ruang</label>
                                <select name="pegGolTerakhir" id="pegGolTerakhir" disabled class="form-control">
                                    <option selected disabled>-- pilih golongan --</option>
                                    @foreach ($golongan as $golongan)
                          <option {{ $data->pegGolTerakhir == $golongan->KODE ? 'selected' : '' }} value="{{ $golongan->KODE }}">{{ $golongan->KODE }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('pegGolTerakhir'))
                                    <small class="form-text text-danger">{{ $errors->first('pegGolTerakhir') }}</small>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">TMT Golongan</label>
                                <input type="text" disabled name="pegTmtGol" id="pegTmtGol" value="{{ $data->pegTmtGol }}"  class="tags form-control @error('pegTmtGol') is-invalid @enderror" />
                                @if ($errors->has('pegTmtGol'))
                                    <small class="form-text text-danger">{{ $errors->first('pegTmtGol') }}</small>
                                @endif
                            </div>

                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Masa Kerja Tahun</label>
                                <input type="text"  disabled name="pegMaskerthn" id="pegMaskerthn" value="{{ $data->pegMaskerthn }}" class="tags form-control @error('pegMaskerthn') is-invalid @enderror" />
                                @if ($errors->has('pegMaskerthn'))
                                    <small class="form-text text-danger">{{ $errors->first('pegMaskerthn') }}</small>
                                @endif
                            </div>

                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Masa Kerja Bulan</label>
                                <input type="text" disabled name="pegMaskerbln" id="pegMaskerbln" value="{{ $data->pegMaskerbln }}" class="tags form-control @error('pegMaskerbln') is-invalid @enderror" />
                                @if ($errors->has('pegMaskerbln'))
                                    <small class="form-text text-danger">{{ $errors->first('pegMaskerbln') }}</small>
                                @endif
                            </div>

                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Pendidikan Terakhir</label>
                                <select disabled name="pegPendAkhir" id="pegPendAkhir" class="form-control @error('pegPendAkhir') is-invalid @enderror" id="">
                                    <option selected disabled>-- pilih pendidikan terakhir --</option>
                                 @foreach ($refpendidikan as $refpendidikan)
                          <option {{ $data->pegPendAkhir == $refpendidikan->pendTingkat ? 'selected' : '' }} value="{{ $refpendidikan->pendTingkat }}">{{ $refpendidikan->pendNama }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('pegPendAkhir'))
                                    <small class="form-text text-danger">{{ $errors->first('pegPendAkhir') }}</small>
                                @endif
                            </div>

                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Tahun Lulus</label>
                                <input type="text" disabled name="pegThnLulus" id="pegThnLulus" value="{{ $data->pegThnLulus }}" class="tags form-control @error('pegThnLulus') is-invalid @enderror" />
                                @if ($errors->has('pegThnLulus'))
                                    <small class="form-text text-danger">{{ $errors->first('pegThnLulus') }}</small>
                                @endif
                            </div>

                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Jurusan</label>
                                <input type="text" disabled name="pegJurusan" id="pegJurusan"  value="{{ $data->pegJurusan }}"  class="tags form-control @error('pegJurusan') is-invalid @enderror" />
                                @if ($errors->has('pegJurusan'))
                                    <small class="form-text text-danger">{{ $errors->first('pegJurusan') }}</small>
                                @endif
                            </div>

                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Nama Sekolah/Universitas</label>
                                <input type="text" disabled name="pegTempat" id="pegTempat" value="{{ $data->pegTempat }}"  class="tags form-control @error('pegTempat') is-invalid @enderror" />
                                @if ($errors->has('pegTempat'))
                                    <small class="form-text text-danger">{{ $errors->first('pegTempat') }}</small>
                                @endif
                            </div>

                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Agama</label>
                                <select name="pegAgama" id="pegAgama" disabled class="form-control @error('pegAgama') is-invalid @enderror" id="">
                                    <option selected disabled>-- pilih agama --</option>
                                    @foreach ($agama as $agama)
                          <option {{ $data->pegAgama == $agama->KODE ? 'selected' : '' }} value="{{ $agama->KODE }}">{{ $agama->NAMA }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('pegAgama'))
                                    <small class="form-text text-danger">{{ $errors->first('pegAgama') }}</small>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Status Pegawai</label>
                                <select name="pegStapeg" id="pegStapeg" disabled class="form-control @error('pegStapeg') is-invalid @enderror" id="">
                                    <option selected disabled>-- pilih status pegawai --</option>
                                    @foreach ($stapeg as $stapeg)
                                <option {{ $data->pegStapeg == $stapeg->KODE ? 'selected' : '' }} value="{{ $stapeg->KODE }}">{{ $stapeg->STAPEG }}</option>

                                    @endforeach
                                </select>
                                @if ($errors->has('pegStapeg'))
                                    <small class="form-text text-danger">{{ $errors->first('pegStapeg') }}</small>
                                @endif
                            </div>

                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Kedudukan Hukum</label>
                                <select name="pegKedHukum" id="pegKedHukum" disabled class="form-control @error('pegKedHukum') is-invalid @enderror" id="">
                                    <option selected disabled>-- pilih kedudukan hukum --</option>
                                    @foreach ($kedkum as $kedkum)
                                       <option {{ $data->pegIdKedHukum == $kedkum->kedIdHukum ? 'selected' : '' }} value="{{ $kedkum->kedIdHukum }}">{{ $kedkum->kedNmHukum }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('pegKedHukum'))
                                    <small class="form-text text-danger">{{ $errors->first('pegKedHukum') }}</small>
                                @endif
                            </div>

                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Jenis Pegawai</label>
                                <select name="pegJenisKepeg" id="pegJenisKepeg" disabled class="form-control @error('pegJenisKepeg') is-invalid @enderror" id="">
                                    <option selected disabled>-- pilih jenis pegawai --</option>
                                    <option {{ $data->pegJenisKepeg == "Guru" ? 'selected' : '' }} value="Guru">Guru</option>
                                    <option {{ $data->pegJenisKepeg == "Karyawan" ? 'selected' : '' }} value="Karyawan">Karyawan</option>
                                </select>
                                @if ($errors->has('pegJenisKepeg'))
                                    <small class="form-text text-danger">{{ $errors->first('pegJenisKepeg') }}</small>
                                @endif
                            </div>

                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Jenis Jabatan</label>
                                <select name="pegKdJenisjab" id="pegKdJenisjab" value="{{ $data->pegKdJenisjab }}" disabled class="form-control @error('pegKdJenisjab') is-invalid @enderror" id="">
                                    <option selected disabled>-- pilih jenis jabatan --</option>
                                    @foreach ($jenisjabatan as $jenisjabatan)
                                   <option {{ $data->pegKdJenisjab == $jenisjabatan->jenKdJenJab ? 'selected' : '' }} value="{{ $jenisjabatan->jenKdJenJab }}">{{ $jenisjabatan->jenNmjenJab }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('pegKdJenisjab'))
                                    <small class="form-text text-danger">{{ $errors->first('pegKdJenisjab') }}</small>
                                @endif
                            </div>

                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1"> Jabatan Terakhir</label>
                                <input type="text" disabled name="pegNmJabatan" value="{{ $data->pegNmJabatan }}" id="pegNmJabatan" class="tags form-control @error('pegNmJabatan') is-invalid @enderror" />
                                @if ($errors->has('pegNmJabatan'))
                                    <small class="form-text text-danger">{{ $errors->first('pegNmJabatan') }}</small>
                                @endif
                            </div>

                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Masa Pensiun</label>
                                <input type="text" disabled name="pegMasapensiun" id="pegMasapensiun" value="{{ $data->pegMasapensiun }}" class="tags form-control @error('pegMasapensiun') is-invalid @enderror" />
                                @if ($errors->has('pegMasapensiun'))
                                    <small class="form-text text-danger">{{ $errors->first('pegMasapensiun') }}</small>
                                @endif
                            </div>

                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">TMT</label>
                                <input type="date" disabled name="pegTmtJab" id="pegTmtJab" value="{{ $data->pegTmtJab }}" class="tags form-control @error('pegTmtJab') is-invalid @enderror" />
                                @if ($errors->has('pegTmtJab'))
                                    <small class="form-text text-danger">{{ $errors->first('pegTmtJab') }}</small>
                                @endif
                            </div>

                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Tugas Tambahan </label>
                                <input type="text" disabled name="pegNamaTgsTmbhan" id="pegNamaTgsTmbhan" value="{{ $data->pegNamaTgsTmbhan }}" class="tags form-control @error('pegNamaTgsTmbhan') is-invalid @enderror" />
                                @if ($errors->has('pegNamaTgsTmbhan'))
                                    <small class="form-text text-danger">{{ $errors->first('pegNamaTgsTmbhan') }}</small>
                                @endif
                            </div>

                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">TMT Tugas Tambahan</label>
                                <input type="text" disabled name="pegTmtTugasTmbhan" id="pegTmtTugasTmbhan" value="{{ $data->pegTmtTugasTmbhan }}" class="tags form-control @error('pegTmtTugasTmbhan') is-invalid @enderror" />
                                @if ($errors->has('pegTmtTugasTmbhan'))
                                    <small class="form-text text-danger">{{ $errors->first('pegTmtTugasTmbhan') }}</small>
                                @endif
                            </div>
                            
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Nomor Kar Peg</label>
                                <input type="text" disabled name="pegNoKarpeg" id="pegNoKarpeg"  value="{{ $data->pegNoKarpeg }}" class="tags form-control @error('pegNoKarpeg') is-invalid @enderror" />
                                @if ($errors->has('pegNoKarpeg'))
                                    <small class="form-text text-danger">{{ $errors->first('pegNoKarpeg') }}</small>
                                @endif
                            </div>
                             <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Sertifikasi</label>
                                <select name="pegSertifikasi" id="pegSertifikasi" value="{{ $data->pegSertifikasi }}" disabled class="form-control @error('pegSertifikasi') is-invalid @enderror" id="">
                                    <option selected disabled>-- pilih sertifikasi --</option>
                                      <option {{ $data->pegSertifikasi == "Sudah" ? 'selected' : '' }} value="Sudah">Sudah</option>
                                    <option {{ $data->pegSertifikasi == "Belum" ? 'selected' : '' }} value="Belum">Belum</option>
                                </select>
                                @if ($errors->has('pegSertifikasi'))
                                    <small class="form-text text-danger">{{ $errors->first('pegSertifikasi') }}</small>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Nomor Sertifikasi</label>
                                <input type="text" disabled name="pegNosertifikasi" id="pegNosertifikasi" value="{{ $data->pegNosertifikasi }}" class="tags form-control @error('pegNosertifikasi') is-invalid @enderror" />
                                @if ($errors->has('pegNosertifikasi'))
                                    <small class="form-text text-danger">{{ $errors->first('pegNosertifikasi') }}</small>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">NIDN</label>
                                <input type="text" disabled name="pegNidn" id="pegNidn" value="{{ $data->pegNidn }}" class="tags form-control @error('pegNidn') is-invalid @enderror" />
                                @if ($errors->has('pegNidn'))
                                    <small class="form-text text-danger">{{ $errors->first('pegNidn') }}</small>
                                @endif
                            </div>
                              <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Satuan Kerja</label>
                                <input type="text" disabled name="pegNamaSubUnit" id="pegNamaSubUnit" value="{{ $data->pegNamaSubUnit }}" class="tags form-control @error('pegNamaSubUnit') is-invalid @enderror" />
                                @if ($errors->has('pegNamaSubUnit'))
                                    <small class="form-text text-danger">{{ $errors->first('pegNamaSubUnit') }}</small>
                                @endif
                            </div>
                             <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">NPWP</label>
                                <input type="text" disabled name="pegNpwp" id="pegNpwp" value="{{ $data->pegNpwp }}" class="tags form-control @error('pegNpwp') is-invalid @enderror" />
                                @if ($errors->has('pegNpwp'))
                                    <small class="form-text text-danger">{{ $errors->first('pegNpwp') }}</small>
                                @endif
                            </div>
                             <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Alamat Rumah</label>
                                <input type="text" disabled name="pegAlamat" id="pegAlamat" value="{{ $data->pegAlamat }}" class="tags form-control @error('pegAlamat') is-invalid @enderror" />
                                @if ($errors->has('pegAlamat'))
                                    <small class="form-text text-danger">{{ $errors->first('pegAlamat') }}</small>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">RT/RW</label>
                                <input type="text" disabled name="pegRt_Rw" id="pegRt_Rw" value="{{ $data->pegRt_Rw }}" class="tags form-control @error('pegRt_Rw') is-invalid @enderror" />
                                @if ($errors->has('pegRt_Rw'))
                                    <small class="form-text text-danger">{{ $errors->first('pegRt_Rw') }}</small>
                                @endif
                            </div>
                             <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Kelurahan/Desa</label>
                                <input type="text" disabled name="pegDesa" id="pegDesa" value="{{ $data->pegDesa }}" class="tags form-control @error('pegDesa') is-invalid @enderror" />
                                @if ($errors->has('pegDesa'))
                                    <small class="form-text text-danger">{{ $errors->first('pegDesa') }}</small>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Kecamatan</label>
                                <input type="text" disabled name="pegKecamatan" id="pegKecamatan" value="{{ $data->pegKecamatan }}" class="tags form-control @error('pegKecamatan') is-invalid @enderror" />
                                @if ($errors->has('pegKecamatan'))
                                    <small class="form-text text-danger">{{ $errors->first('pegKecamatan') }}</small>
                                @endif
                            </div>
                             <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Kabupaten</label>
                                <input type="text" disabled name="pegKabupaten" id="pegKabupaten" value="{{ $data->pegKabupaten }}" class="tags form-control @error('pegKabupaten') is-invalid @enderror" />
                                @if ($errors->has('pegKabupaten'))
                                    <small class="form-text text-danger">{{ $errors->first('pegKabupaten') }}</small>
                                @endif
                            </div>
                              <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Provinsi</label>
                                <input type="text" disabled name="pegProvinsi" id="pegProvinsi" value="{{ $data->pegProvinsi }}" class="tags form-control @error('pegProvinsi') is-invalid @enderror" />
                                @if ($errors->has('pegProvinsi'))
                                    <small class="form-text text-danger">{{ $errors->first('pegProvinsi') }}</small>
                                @endif
                            </div>
                               <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Nomor Telpon/HP</label>
                                <input type="text" disabled name="pegNoHp" id="pegNoHp" value="{{ $data->pegNoHp }}" class="tags form-control @error('pegNoHp') is-invalid @enderror" />
                                @if ($errors->has('pegNoHp'))
                                    <small class="form-text text-danger">{{ $errors->first('pegNoHp') }}</small>
                                @endif
                            </div>
                                 <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Nomor KTP/NIK</label>
                                <input type="text" disabled name="pegNik" id="pegNik" value="{{ $data->pegNik }}" class="tags form-control @error('pegNik') is-invalid @enderror" />
                                @if ($errors->has('pegNik'))
                                    <small class="form-text text-danger">{{ $errors->first('pegNik') }}</small>
                                @endif
                            </div>
                                  <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="text" disabled name="pegEmail" id="pegEmail" value="{{ $data->pegEmail }}" class="tags form-control @error('pegEmail') is-invalid @enderror" />
                                @if ($errors->has('pegEmail'))
                                    <small class="form-text text-danger">{{ $errors->first('pegEmail') }}</small>
                                @endif
                            </div>
                             <div class="col-md-12" style="text-align:center;">
                            <a onclick="enable()" id="ubahdata" class="btn btn-primary btn-sm" style="color:white;"><i class="fa fa-edit"></i>&nbsp; Ubah Data </a>
                            <button type="submit" id="simpan" class="btn btn-primary btn-sm" style="display:none;"><i class="fa fa-check-circle"></i>&nbsp; Simpan Perubahan</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        function enable(){
            $("#pegNip").prop('disabled', false);
            $("#pegGlrDpn").prop('disabled', false);
            $("#pegNama").prop('disabled', false);
            $("#pegGlrBlg").prop('disabled', false);
            $("#pegTpLhr").prop('disabled', false);
            $("#pegTglLhr").prop('disabled', false);
            $("#pegJenkel").prop('disabled', false);
            $("#pegKetkawin").prop('disabled', false);
            $("#pegTmtCpns").prop('disabled', false);
            $("#pegTmtPns").prop('disabled', false);
            $("#pegGolTerakhir").prop('disabled', false);
            $("#pegTmtGol").prop('disabled', false);
            $("#pegMaskerthn").prop('disabled', false);
            $("#pegMaskerbln").prop('disabled', false);
            $("#pegPendAkhir").prop('disabled', false);
            $("#pegThnLulus").prop('disabled', false);
            $("#pegJurusan").prop('disabled', false);
            $("#pegTempat").prop('disabled', false);
            $("#pegAgama").prop('disabled', false);
            $("#pegStapeg").prop('disabled', false);
            $("#pegKedHukum").prop('disabled', false);
            $("#pegJenisKepeg").prop('disabled', false);
            $("#pegNmJabatan").prop('disabled', false);
            $("#pegMasapensiun").prop('disabled', false);
            $("#pegTmtJab").prop('disabled', false);
            $("#pegNamaTgsTmbhan").prop('disabled', false);
            $("#pegTmtTugasTmbhan").prop('disabled', false);
            $("#pegNoKarpeg").prop('disabled', false);
            $("#pegSertifikasi").prop('disabled', false);
            $("#pegNosertifikasi").prop('disabled', false);
            $("#pegNidn").prop('disabled', false);
            $("#pegNamaSubUnit").prop('disabled', false);
            $("#pegNpwp").prop('disabled', false);
            $("#pegAlamat").prop('disabled', false);
            $("#pegRt_Rw").prop('disabled', false);
            $("#pegDesa").prop('disabled', false);
            $("#pegKecamatan").prop('disabled', false);
            $("#pegKabupaten").prop('disabled', false);
            $("#pegProvinsi").prop('disabled', false);
            $("#pegNoHp").prop('disabled', false);
            $("#pegNik").prop('disabled', false);
            $("#pegEmail").prop('disabled', false);
            $("#pegKetKawin").prop('disabled', false);
            $("#pegGolTerakhir").prop('disabled', false);
            $("#pegNmJabatan").prop('disabled', false);
            $("#pegKdJenisjab").prop('disabled', false);

            

            $('#ubahdata').hide();
            $('#simpan').show();
        }
    </script>
@endpush
