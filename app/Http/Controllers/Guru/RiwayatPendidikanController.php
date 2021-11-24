<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RiwayatPendidikanController extends Controller
{
    public function index(){
        return view('guru/pendidikan.index');
    }

    public function add(){
        return view('guru/pendidikan.add');
    }
}
