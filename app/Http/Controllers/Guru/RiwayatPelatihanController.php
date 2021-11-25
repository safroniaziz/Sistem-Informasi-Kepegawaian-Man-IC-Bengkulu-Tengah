<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class RiwayatPelatihanController extends Controller
{
    public function index(){
        return view('guru/pelatihan.index');
    }

    public function add(){
        $diklat = DB::table('refdiklat')->select('dtkddiklat','dtnmdiklat')->get();
        $jabatan = DB::table('tbjenjab')->select('jabKdJab','jabNama')->get();
        $kawin = DB::table('refkawin')->select('KODE','KET')->get();
        return view('guru/pelatihan.add',compact('diklat','jabatan','kawin'));


    }
}
