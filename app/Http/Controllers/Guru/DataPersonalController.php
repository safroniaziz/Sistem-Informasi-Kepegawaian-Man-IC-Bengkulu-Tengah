<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DataPersonalController extends Controller
{
    public function index(){
        return view('guru/personal.index');
    }

    public function add(){
        return view('guru/personal.add');
    }
}
