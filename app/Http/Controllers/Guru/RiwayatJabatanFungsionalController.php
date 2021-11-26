<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\RiwayatJabatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class RiwayatJabatanFungsionalController extends Controller
{
    public function index(){
        $jabatans = RiwayatJabatan::all();
        return view('guru/jabatan_fungsional.index',compact('jabatans'));
    }

    public function add(){
        $bidangilmu = DB::table('tbmapel')->select('mapKdMapel','mapNmMapel')->get();
        $jabatan = DB::table('tbjenjab')->select('jabKdJab','jabNama')->get();
        return view('guru/jabatan_fungsional.add',compact('bidangilmu','jabatan'));
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
            'jfKdJenisjab'   =>  'Jenis Jabatan',
            'jfKdjab'   =>  'Jabatan',
            'jfTmtjab'   =>  'Tamatan',
            'jfNoSk'   =>  'Nomor SK',
            'jfTglSk'   =>  'Tanggal SK',
            'jfPejabat'   =>  'Pejabat Tertanda',
            'jfKdunit'   =>  'Bidang Ilmu ',
            'jfDokumen'   =>  'Upload Dokumen ',
        ];
        $this->validate($request, [
            'jfKdJenisjab'    =>  'required',
            'jfKdjab'    =>  'required',
            'jfTmtjab'    =>  'required',
            'jfNoSk'    =>  'required',
            'jfTglSk'    =>  'required',
            'jfPejabat'    =>  'required',
            'jfKdunit'    =>  'required',
            'jfDokumen'    =>  'required|mimes:doc,pdf,docx,jpg|max:1000',
        ],$messages,$attributes);

        $model = $request->all();
        $model['jfDokumen'] = null;
        $slug_user = Str::slug(Auth::user()->pegNama);

        if ($request->hasFile('jfDokumen')) {
            $model['jfDokumen'] = $slug_user.'-'.Auth::user()->jfNip.'-'.date('now').'.'.$request->jfDokumen->getClientOriginalExtension();
            $request->jfDokumen->move(public_path('/upload/dokumen_jabatan_fungsional/'.$slug_user), $model['jfDokumen']);
        }

        RiwayatJabatan::create([
            'jfNip'       =>  Auth::user()->pegNip,
            'jfKdJenisjab'    =>  $request->jfKdJenisjab,
            'jfKdjab'    =>  $request->jfKdjab,
            'jfTmtjab'    =>  $request->jfTmtjab,
            'jfNoSk'    =>  $request->jfNoSk,
            'jfTglSk'    =>  $request->jfTglSk,
            'jfPejabat'    =>  $request->jfPejabat,
            'jfKdunit'    =>  $request->jfKdunit,
            'jfDokumen'    =>  $model['jfDokumen'],
            'jfTglUnggah' =>  date("Y-m-d H:i:s"),
        ]);

        $notification = array(
            'message' => 'Berhasil, data pendidikan berhasil ditambahkan!',
            'alert-type' => 'success'
        );
        return redirect()->route('guru.jabatan_fungsional')->with($notification);
    }
}
