<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Agama;
use App\Models\JenJab;
use App\Models\Kawin;
use App\Models\KedHukum;
use App\Models\Pegawai;
use App\Models\RefStapeg;
use App\Models\RiwayatJabatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GuruDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard(){
        $personal = Pegawai::select('pegNmJabatan','pegPendAkhir','pegGolTerakhir','pegStapeg')->where('pegNip',Auth::user()->pegNip)->first();
        return view('guru/dashboard',compact('personal'));
    }
}
