<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Anak;
use App\Models\Keluarga;
use App\Models\Pegawai;
use App\Models\Pelatihan;
use App\Models\Pendidikan;
use App\Models\RiwayatGolongan;
use App\Models\RiwayatJabatan;
use App\Models\TugasTambahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CetakDrh extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $title = 'Cetak CV - Simpeg MAN IC Benteng';
        $pelatihan = Pelatihan::where('pltnip',Auth::user()->pegNip)->get();
        $foto  =  Pegawai::select('pegPoto')->where('pegNip',Auth::user()->pegNip)->first();
        $personal      = Pegawai::where('pegNip',Auth::user()->pegNip)->first();
        $pendidikan  = Pendidikan::where('PendNip',Auth::user()->pegNip)->get();
        $kepangkatan      = RiwayatGolongan::where('goNip',Auth::user()->pegNip)->get();
        $jabatan      = RiwayatJabatan::where('jfNip',Auth::user()->pegNip)->get();
        $tugas_tambahan      = TugasTambahan::where('tgsNip',Auth::user()->pegNip)->get();
        $suami_istri     = Keluarga::where('kelNip',Auth::user()->pegNip)->get();
        $anak     = Anak::where('akNip',Auth::user()->pegNip)->get();

        
        // return $pendidikan;
        return view('guru/drh.index',compact('title','pelatihan','foto',
        'personal','pendidikan','kepangkatan','jabatan','tugas_tambahan','suami_istri','anak'));
    }
}
