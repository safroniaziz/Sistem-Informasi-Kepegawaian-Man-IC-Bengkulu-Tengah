<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RiwayatTugasTambahanController extends Controller
{
    public function index(){
        return view('guru/tugas_tambahan.index');
    }

    public function add(){
        return view('guru/tugas_tambahan.add');
    }
}
