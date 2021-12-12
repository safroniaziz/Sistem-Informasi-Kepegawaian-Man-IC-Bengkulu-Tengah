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
            <i class="fa fa-home"></i>&nbsp;Data Keluarga
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
                    <a href="{{ route('guru.istri_atau_suami.add') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>&nbsp;Tambah Data</a>
                </div>
                <div class="col-md-12">
                    <table class="table table-striped table-bordered" id="table" style="width:100%;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Istri/Suami</th>
                                <th>Istri/suami ke</th>
                                <th>Pekerjaan</th>
                                <th>NIP</th>
                                <th>Tempat Lahir</th>
                                <th>Tanggal Lahir</th>
                                <th>Tanggal Nikah</th>
                                <th>Tanggal Meninggal</th>
                                <th>Tanggal Cerai</th>
                                <th>Nomor BPJS</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no=1;
                            @endphp
                             @foreach ($keluargas as $keluarga)
                             <tr>
                                 <td> {{ $no++ }} </td>
                              
                                 
                                 <td> {{ $keluarga->kelNama }} </td>
                                 <td> {{ $keluarga->kelNoUrt }} </td>
                                 <td> {{ $keluarga->kelKerjaan }} </td>
                                 <td> {{ $keluarga->kelNipIstri }} </td>
                           
                                 <td> {{ $keluarga->kelTpLhr }} </td>
                                 <td> {{ $keluarga->kelTglLhr }} </td>
                                 <td> {{ $keluarga->kelTglNikah }} </td>
                                 <td> {{ $keluarga->kelTglNinggal }} </td>
                                   <td> {{ $keluarga->kelTglCerai }} </td>
                                 <td> {{ $keluarga->kelBpjs }} </td>
          
  
                                    <td>
                                        <a href="{{ route('guru.istri_atau_suami.edit',[$keluarga->kelNoUrt]) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i>&nbsp; Edit</a>
                                        <form action="{{ route('guru.istri_atau_suami.delete',[$keluarga->kelNoUrt]) }}" method="POST">
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