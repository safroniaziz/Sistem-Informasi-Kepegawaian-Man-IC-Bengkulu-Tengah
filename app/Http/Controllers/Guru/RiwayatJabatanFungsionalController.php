<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RiwayatJabatanFungsionalController extends Controller
{
    public function index(){
        return view('guru/jabatan_fungsional.index');
    }

    public function add(){
        $bidangilmu = DB::table('tbmapel')->select('mapKdMapel','mapNmMapel')->get();
        $jabatan = DB::table('tbjenjab')->select('jabKdJab','jabNama')->get();
        return view('guru/jabatan_fungsional.add',compact('bidangilmu','jabatan'));


    }
}
