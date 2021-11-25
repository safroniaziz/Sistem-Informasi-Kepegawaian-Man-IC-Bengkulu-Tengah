<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RiwayatKepangkatanController extends Controller
{
    public function index(){
        return view('guru/kepangkatan.index');
    }

    public function add(){
        return view('guru/kepangkatan.add');
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
            'goGol'   =>  'Golongan',
            'goTmtGol'   =>  'Tamatan Golongan',
            'goNoSk'   =>  'Nomor SK',
            'goTglSk'   =>  'Tanggal SK',
            'goMaskerThn'   =>  'Masa Kerja Gol Tahun',
            'goMaskerBln'   =>  'Masa Kerja Gol Bulan',
            'goGapok'   =>  'Gaji Pokok ',
            'goDokumen'   =>  'SK Kepangkatan ',
        ];
        $this->validate($request, [
            'goGol'    =>  'required',
            'goTmtGol'    =>  'required',
            'goNoSk'    =>  'required',
            'goTglSk'    =>  'required',
            'goMaskerThn'    =>  'required',
            'goMaskerBln'    =>  'required',
            'goGapok'    =>  'required',
            'goDokumen'    =>  'required|mimes:doc,pdf,docx,jpg|max:1000',
        ],$messages,$attributes);

        $model = $request->all();
        $model['goDokumen'] = null;
        $slug_user = Str::slug(Auth::user()->pegNama);

        if ($request->hasFile('goDokumen')) {
            $model['goDokumen'] = $slug_user.'-'.Auth::user()->goNip.'-'.date('now').'.'.$request->goDokumen->getClientOriginalExtension();
            $request->goDokumen->move(public_path('/upload/dokumen_pendidikan'.$slug_user), $model['goDokumen']);
        }

        Kepangkatan::create([
            'goNip'       =>  Auth::user()->goNip,
            'goGol'    =>  $request->goGol,
            'goTmtGol'    =>  $request->goTmtGol,
            'goNoSk'    =>  $request->goNoSk,
            'goTglSk'    =>  $request->goTglSk,
            'goMaskerThn'    =>  $request->goMaskerThn,
            'goMaskerBln'    =>  $request->goMaskerBln,
            'goGapok'    =>  $request->goGapok,
            'goDokumen'    =>  $model['goDokumen'],
            'goTglUnggah' =>  date("Y-m-d H:i:s"),
        ]);

        $notification = array(
            'message' => 'Berhasil, data pendidikan berhasil ditambahkan!',
            'alert-type' => 'success'
        );
        return redirect()->route('guru.kepangkatan')->with($notification);
    }
}
