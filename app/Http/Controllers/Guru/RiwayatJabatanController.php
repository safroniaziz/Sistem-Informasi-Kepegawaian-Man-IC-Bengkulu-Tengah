<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RiwayatJabatanController extends Controller
{
    public function index(){
        return view('guru/jabatan.index');
    }

    public function add(){
        return view('guru/jabatan.add');
    }
}
