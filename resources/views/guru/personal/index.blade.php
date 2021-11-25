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
            <i class="fa fa-home"></i>&nbsp;Arsip Dokumen Universitas Bengkulu
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
                <div class="col-md-12">
                    <a href="{{ route('guru.personal.add') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>&nbsp;Tambah Data</a>
                </div>
                <div class="col-md-12">
                    <table class="table table-striped table-bordered" id="table" style="width:100%;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tingkat Pendidikan</th>
                                <th>Nomor Ijazah</th>
                                <th>Tahun Lulus</th>
                                <th>Tanggal Lulus</th>
                                <th>Tempat Sekolah</th>
                                <th>Jurusan</th>
                                <th>Golongan / Ruang</th>
                                <th>TMT Golongan</th>
                                <th>Nomor SK</th>
                                <th>Tanggal SK</th>
                                <th>Masa Kerja Gol</th>
                                <th>Gaji Pokok</th>
                                <th>Tugas Tambahan</th>
                                <th>TMT</th>
                                    <th>Tahun Lulus</th>
                                <th>Tanggal Lulus</th>
                                <th>Tempat Sekolah</th>
                                <th>Jurusan</th>
                                <th>Golongan / Ruang</th>
                                <th>TMT Golongan</th>
                                <th>Nomor SK</th>
                                <th>Tanggal SK</th>
                                <th>Masa Kerja Gol</th>
                                <th>Gaji Pokok</th>
                                <th>Tugas Tambahan</th>
                                <th>TMT</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no=1;
                            @endphp
                            @foreach ($pegawai as $pegawai)
                            <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $pegawai->pegNip }}</td>
                            <td>{{ $pegawai->pegGlrDpn }}</td>
                            <td>{{ $pegawai->pegNama }}</td>
                            <td>{{ $pegawai->pegGlrBlg }}</td>
                            <td>{{ $pegawai->pegTpLhr }}</td>
                            <td>{{ $pegawai->pegTglLhr }}</td>
                            <td>{{ $pegawai->pegJenkel }}</td>
                            <td>{{ $pegawai->pegKetkawin }}</td>
                            <td>{{ $pegawai->pegKdkawin }}</td>
                            <td>{{ $pegawai->pegTmtCpns }}</td>
                            <td>{{ $pegawai->pegTmtPns }}</td>
                            <td>{{ $pegawai->pegGolTerakhir }}</td>
                            <td>{{ $pegawai->pegTmtGol }}</td>
                            <td>{{ $pegawai->pegMaskerthn }}</td>
                            <td>{{ $pegawai->pegMaskerbln }}</td>
                            <td>{{ $pegawai->pegPendAkhir }}</td>
                            <td>{{ $pegawai->pegThnLulus }}</td>
                            <td>{{ $pegawai->pegJurusan }}</td>
                              <td>{{ $pegawai->pegTempat }}</td>
                            <td>{{ $pegawai->pegAgama }}</td>
                            <td>{{ $pegawai->pegStapeg }}</td>
                            <td>{{ $pegawai->pegGolTerakhir }}</td>
                             <td>{{ $pegawai->pegTmtGol }}</td>
                            <td>{{ $pegawai->pegMaskerthn }}</td>
                            <td>{{ $pegawai->pegMaskerbln }}</td>
                            <td>{{ $pegawai->pegPendAkhir }}</td>
                            <td>{{ $pegawai->pegThnLulus }}</td>
                            <td>{{ $pegawai->pegJurusan }}</td>
                            {{--  <td>
                                <a class="btn btn-primary btn-sm" href="{{ asset('upload/dokumen_pendidikan/'.\Illuminate\Support\Str::slug(Auth::user()->pegNama).'/'.$pendidikan->pendDokumen) }}" download="{{ $pendidikan->pendDokumen }}"><i class="fa fa-download"></i>&nbsp; Download</a>
                            </td>  --}}
                            {{--  <td>
                                <a href="{{ route('guru.pendidikan.update',[$pendidikan->pendNip]) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i>&nbsp; Edit</a>
                            </td>  --}}

                        @endforeach
                        </tbody>
                    </table>
                    <!-- Modal Hapus-->
                    <div class="modal fade modal-danger" id="modalhapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form action=" {{ route('guru.personal.delete') }} " method="POST">
                                    {{ csrf_field() }} {{ method_field('DELETE') }}
                                    <div class="modal-header">
                                        <p style="font-size:15px; font-weight:bold;" class="modal-title"><i class="fa fa-trash"></i>&nbsp;Form Konfirmasi Hapus Data</p>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input type="hidden" name="id" id="id_hapus">
                                                Apakah anda yakin ingin menghapus data? klik hapus jika iya !!
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" style="border: 1px solid #fff;background: transparent;color: #fff;" class="btn btn-sm btn-outline pull-left" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp; Batalkan</button>
                                        <button type="submit" style="border: 1px solid #fff;background: transparent;color: #fff;" class="btn btn-sm btn-outline"><i class="fa fa-check-circle"></i>&nbsp; Ya, Hapus</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

