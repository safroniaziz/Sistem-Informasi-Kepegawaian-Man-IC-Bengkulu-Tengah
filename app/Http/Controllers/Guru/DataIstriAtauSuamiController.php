<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DataIstriAtauSuamiController extends Controller
{
    public function index(){
        return view('guru/data_istri_atau_suami.index');
    }

    public function add(){
        return view('guru/data_istri_atau_suami.add');
    }
}
