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

    public function post(Request $request){
        $messages = [
            'required' => ':attribute harus diisi',
            'numeric' => ':attribute harus angka',
            'mimes' => 'The :attribute harus berupa file: :values.',
            'max' => [
                'file' => ':attribute tidak boleh lebih dari :max kilobytes.',
            ],
        ];
        $attributes = [
            'pendNmSekol'   =>  'Nama Sekolah',
            'pendNoIjazah'   =>  'Nomor Ijazah',
            'file'   =>  'File',
            'uraian_informasi'   =>  'Uraian Informasi',
        ];
        $this->validate($request, [
            'nomor_berkas'    =>  'required',
            'jenis_berkas'    =>  'required',
            'klasifikasi_id'    =>  'required',
            'file'    =>  'required|mimes:doc,pdf,docx,jpg|max:2000',
            'uraian_informasi'    =>  'required',
        ],$messages,$attributes);
    }
}
