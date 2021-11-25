<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DataAnakController extends Controller
{
    public function index(){
        return view('guru/data_anak.index');
    }

    public function add(){
        return view('guru/data_anak.add');
    }
}
