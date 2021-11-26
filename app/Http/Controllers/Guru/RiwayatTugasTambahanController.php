<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\TugasTambahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class RiwayatTugasTambahancontroller extends Controller
{
    public function index(){
        $tugastambahans = TugasTambahan::all();
        return view('guru/tugas_tambahan.index',compact('tugastambahans'));
    }

    public function add(){
        return view('guru/tugas_tambahan.add');
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
            'tgsNoUrut'   =>  'No Urut',
            'tgsNamajab'   =>  'Tugas Tambahan',
            'tgsTmt'   =>  'Tamatan',
            'tgsNoSk'   =>  'Nomor SK',
            'tgsTglSk'   =>  'Tanggal SK',
            'tgsTtdPejabat'   =>  'Pejabat TTD',
            'tgsDokumen'   =>  'Upload Dokumen',
        ];
        $this->validate($request, [
            'tgsNoUrut'    =>  'required',
            'tgsNamajab'    =>  'required',
            'tgsTmt'    =>  'required',
            'tgsNoSk'    =>  'required',
            'tgsTglSk'    =>  'required',
            'tgsTtdPejabat'    =>  'required',
            'tgsDokumen'    =>  'required|mimes:doc,pdf,docx,jpg|max:1000',
        ],$messages,$attributes);

        $model = $request->all();
        $model['tgsDokumen'] = null;
        $slug_user = Str::slug(Auth::user()->pegNama);

        if ($request->hasFile('tgsDokumen')) {
            $model['tgsDokumen'] = $slug_user.'-'.Auth::user()->tgsNip.'-'.date('now').'.'.$request->tgsDokumen->getClientOriginalExtension();
            $request->tgsDokumen->move(public_path('/upload/dokumen_tugas_tambahan/'.$slug_user), $model['tgsDokumen']);
        }

        TugasTambahan::create([
            'tgsNip'       =>  Auth::user()->pegNip,
            'tgsNoUrut'    =>  $request->tgsNoUrut,
            'tgsNamajab'    =>  $request->tgsNamajab,
            'tgsTmt'    =>  $request->tgsTmt,
            'tgsNoSk'    =>  $request->tgsNoSk,
            'tgsTglSk'    =>  $request->tgsTglSk,
            'tgsTtdPejabat'    =>  $request->tgsTtdPejabat,
            'tgsDokumen'    =>  $model['tgsDokumen'],
            'tgsTglUnggah' =>  date("Y-m-d H:i:s"),
        ]);

        $notification = array(
            'message' => 'Berhasil, data pendidikan berhasil ditambahkan!',
            'alert-type' => 'success'
        );
        return redirect()->route('guru.tugas_tambahan')->with($notification);
    }
}
