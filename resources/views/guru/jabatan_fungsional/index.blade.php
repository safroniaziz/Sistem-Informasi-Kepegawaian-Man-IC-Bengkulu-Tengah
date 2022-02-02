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
            <i class="fa fa-home"></i>&nbsp;Riwayat Jabatan
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
                                <strong><i class="fa fa-info-circle"></i>&nbsp;Perhatian: </strong> Berikut semua data jabatan fungsional yang sudah diunggah
                           
                            </div>
                    @endif
                </div>
                <div class="col-md-12">
                    <a href="{{ route('guru.jabatan_fungsional.add') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>&nbsp;Tambah Data</a>
                </div>
                <div class="col-md-12 table-responsive">
                    <table class="table table-striped table-bordered" id="table" style="width:100%;">
                        <thead>
                            <tr>
                                <th>No</th>
                                {{--  <th>Jenis Jabatan</th>  --}}
                                <th>Jabatan</th>
                                <th>Tamatan</th>
                                <th>Nomor SK</th>
                                <th>Tanggal SK</th>
                                {{--  <th>Pejabat TTD</th>
                                <th>Bidang Ilmu</th>  --}}
                                <th>Download Dokumen</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no=1;
                            @endphp
                            @foreach ($jabatans as $jabatan)
                            <tr>
                                <td>{{ $no++ }}</td>
                                {{--  <td>{{ $jabatan->jfKdJenisjab }}</td>  --}}
                                <td>{{ $jabatan->jfNamajab }}</td>
                                <td>{{ $jabatan->jfTmtJab }}</td>
                                <td>{{ $jabatan->jfNoSk }}</td>
                                <td>{{ $jabatan->jfTglSk }}</td>
                                {{--  <td>{{ $jabatan->jfPejabat }}</td>
                                <td>{{ $jabatan->jfKdunit }}</td>  --}}
                                <td>
                                    <a class="btn btn-primary btn-sm" href="{{ asset('upload/dokumen_jabatan_fungsional/'.\Illuminate\Support\Str::slug(Auth::user()->pegNama).'/'.$jabatan->jfDokumen) }}" download="{{ $jabatan->jfDokumen }}"><i class="fa fa-download"></i>&nbsp; Download</a>
                                </td>
                                <td>
                                    <a href="{{ route('guru.jabatan_fungsional.edit',[$jabatan->jfNoUrt]) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i>&nbsp; Edit</a>
                                    <form action="{{ route('guru.jabatan_fungsional.delete',[$jabatan->jfNoUrt]) }}" method="POST">
                                        {{ csrf_field() }} {{ method_field("DELETE") }}

                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>&nbsp; Hapus</button>
                                    </form>
                                </td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $('#table').DataTable({
                responsive : true,
            });
        } );
    </script>
@endpush
