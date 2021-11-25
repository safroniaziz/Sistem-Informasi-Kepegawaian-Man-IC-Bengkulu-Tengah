<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Keluarga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class DataIstriAtauSuamiController extends Controller
{
    public function index(){
        $keluargas = Keluarga::all();
        return view('guru/data_istri_atau_suami.index',compact('keluargas'));
    }

    public function add(){
        return view('guru/data_istri_atau_suami.add');
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
            'kelNama'   =>  'Nama Istri/Suami',
            'kelKerjaan'   =>  'Pekerjaan',
            'kelNip'   =>  'NIP',
            'kelTpLhr'   =>  'Tempat Lahir',
            'kelTglLhr'   =>  'Tanggal Lahir',
            'kelTglNikah'   =>  'Tanggal Nikah',
            'kelTglCerai'   =>  'Tanggal Cerai ',
            'kelTglNinggal'   =>  'Tanggal Meninggal ',
            'kelBpjs'   =>  'BPJS No ',
        ];
        $this->validate($request, [
            'kelNama'    =>  'required',
            'kelKerjaan'    =>  'required',
            'kelNip'    =>  'required',
            'kelTpLhr'    =>  'required',
            'kelTglLhr'    =>  'required',
            'kelTglNikah'    =>  'required',
            'kelBpjs'    =>  'required',
        ],$messages,$attributes);

        // $model = $request->all();
        // $model['goDokumen'] = null;
        // $slug_user = Str::slug(Auth::user()->pegNama);

        // if ($request->hasFile('goDokumen')) {
        //     $model['goDokumen'] = $slug_user.'-'.Auth::user()->pegNip.'-'.date('now').'.'.$request->goDokumen->getClientOriginalExtension();
        //     $request->goDokumen->move(public_path('/upload/dokumen_kepangkatan/'.$slug_user), $model['goDokumen']);
        // }

        Keluarga::create([
            'kelNip'       =>  Auth::user()->pegNip,
            'kelNama'    =>  $request->kelNama,
            'kelKerjaan'    =>  $request->kelKerjaan,
            'kelNip'    =>  $request->kelNip,
            'kelTpLhr'    =>  $request->kelTpLhr,
            'kelTglLhr'    =>  $request->kelTglLhr,
            'kelTglNikah'    =>  $request->kelTglNikah,
            'kelTglCerai'    =>  $request->kelTglCerai,
            'kelTglNinggal'    =>  $request->kelTglNinggal,
            // 'goDokumen'    =>  $model['goDokumen'],
            'goTglUnggah' =>  date("Y-m-d H:i:s"),
        ]);

        $notification = array(
            'message' => 'Berhasil, data pendidikan berhasil ditambahkan!',
            'alert-type' => 'success'
        );
        return redirect()->route('guru.istri_atau_suami')->with($notification);
    }
}
