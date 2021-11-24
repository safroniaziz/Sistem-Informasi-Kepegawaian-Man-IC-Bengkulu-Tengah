<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RiwayatKepangkatanController extends Controller
{
    public function index(){
        return view('guru/kepangkatan.index');
    }

    public function add(){
        return view('guru/kepangkatan.add');
    }
}
