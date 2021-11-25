<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataPersonalController extends Controller
{
    public function index(){
        
        $pegawai = DB::table('tbpegawai')->where('pegNip',Auth::user()->pegNip)->get();
        return view('guru/personal.index',compact('pegawai'));
    }

    public function add(){
        $bidangilmu = DB::table('tbmapel')->select('mapKdMapel','mapNmMapel')->get();
        $jabatan = DB::table('tbjenjab')->select('jabKdJab','jabNama')->get();
        $kawin = DB::table('refkawin')->select('KODE','KET')->get();
        return view('guru/personal.add',compact('bidangilmu','jabatan','kawin'));


    }
}
