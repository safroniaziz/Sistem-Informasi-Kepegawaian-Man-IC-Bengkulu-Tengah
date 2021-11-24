<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RiwayatDataKeluargaController extends Controller
{
    public function index(){
        return view('guru/data_keluarga.index');
    }

    public function add(){
        return view('guru/data_keluarga.add');
    }
}
