<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class RiwayatPelatihanController extends Controller
{
    public function index(){
        $pelatihan = DB::table('tbpelatihan')->select('pltKddiklat','pltNmdiklat','pltKddiklat2','pltNmdiklat2','pltTglmulai','pltTglakhir','pltnosertifikat','pltThnsertifikat','pltTempat','pltDokumen')->get();
        return view('guru/pelatihan.index',compact('pelatihan'));
    }

    public function add(){
        $diklat = DB::table('refdiklat')->select('dktkddiklat','dktnmdiklat')->get();
        $pelatihan = DB::table('tbpelatihan')->select('pltKddiklat','pltNmdiklat','pltKddiklat2','pltNmdiklat2','pltTglmulai','pltTglakhir','pltnosertifikat','pltThnsertifikat','pltTempat','pltDokumen')->get();
      
        return view('guru/pelatihan.add',compact('diklat','pelatihan'));


    }
}
