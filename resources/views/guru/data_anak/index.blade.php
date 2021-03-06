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
                                <strong><i class="fa fa-info-circle"></i>&nbsp;Perhatian: </strong> Berikut semua data anak yang sudah diunggah
                          
                            </div>
                    @endif
                </div>
                <div class="col-md-12">
                    <a href="{{ route('guru.data_anak.add') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>&nbsp;Tambah Data</a>
                </div>
                <div class="col-md-12 table-responsive">
                    <table class="table table-striped table-bordered" id="table" style="width:100%;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Status Anak</th>
                                <th>Jenis Kelamin</th>
                                <th>Tempat Lahir</th>
                                <th>Tangal Lahir</th>
                                <th>Status Pendidikan</th>
                                <th>Pendidikan Terakhir</th>
                                <th>Alasan Tidak Sekolah</th>
                                <th>Pekerjaan</th>
                                {{--  <th>NIP</th>  --}}
                                <th>BPJS No</th>
                                <th>Nama Ibu</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no=1;
                            @endphp
                            @foreach ($anaks as $anak)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $anak->akNama }}</td>
                                <td>{{ $anak->akStatus }}</td>
                                <td>{{ $anak->akJenkel }}</td>
                                <td>{{ $anak->akTpLhr }}</td>
                                <td>{{ $anak->akTglLhr }}</td>
                                <td>{{ $anak->akStatusPend }}</td>
                                <td>{{ $anak->akPendAkhir }}</td>
                                <td>{{ $anak->akAlsanTdkSekolah }}</td>
                                <td>{{ $anak->akKerjaan }}</td>
                                {{--  <td>{{ $anak->akNip }}</td>  --}}
                                <td>{{ $anak->akNoBpjs }}</td>
                                <td>{{ $anak->akIbu }}</td>

                                <td>
                                    <a href="{{ route('guru.data_anak.edit',[$anak->akNoUrt]) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i>&nbsp; Edit</a>
                                    <form action="{{ route('guru.data_anak.delete',[$anak->akNoUrt]) }}" method="POST">
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
