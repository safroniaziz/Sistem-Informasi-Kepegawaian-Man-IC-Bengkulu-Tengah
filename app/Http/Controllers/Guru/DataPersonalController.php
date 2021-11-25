<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Pegawai;

class DataPersonalController extends Controller
{
    public function index(){
        $pegawai = DB::table('tbpegawai')->where('pegNip', Auth::user()->pegNip)->get();
        // return $pegawai;
        return view('guru/personal.index',compact('pegawai'));
    }

    public function add(){
        $bidangilmu = DB::table('tbmapel')->select('mapKdMapel','mapNmMapel')->get();
        $jabatan = DB::table('tbjenjab')->select('jabKdJab','jabNama')->get();
        $kawin = DB::table('refkawin')->select('KODE','KET')->get();
        return view('guru/personal.add',compact('bidangilmu','jabatan','kawin'));


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
            'pendThnLls'   =>  'Tahun Lulus',
            'pendTglIjazah'   =>  'Tanggal Ijazah',
            'pendTempat'   =>  'Tempat Pegawai',
            'pendJurusan'   =>  'Pegawai Jurusan',
            'pendDokumen'   =>  'Upload Ijazah ',
        ];
        $this->validate($request, [
            'pendNmSekol'    =>  'required',
            'pendNoIjazah'    =>  'required',
            'pendThnLls'    =>  'required',
            'pendTglIjazah'    =>  'required',
            'pendTempat'    =>  'required',
            'pendJurusan'    =>  'required',
            'pendDokumen'    =>  'required|mimes:doc,pdf,docx,jpg|max:1000',
        ],$messages,$attributes);

        // $model = $request->all();
        // $model['pendDokumen'] = null;
        // $slug_user = Str::slug(Auth::user()->pegNama);

        // if ($request->hasFile('pendDokumen')) {
        //     $model['pendDokumen'] = $slug_user.'-'.Auth::user()->pegNip.'-'.date('now').'.'.$request->pendDokumen->getClientOriginalExtension();
        //     $request->pendDokumen->move(public_path('/upload/dokumen_pendidikan/'.$slug_user), $model['pendDokumen']);
        // }

        Pegawai::create([
            'pendNip'       =>  Auth::user()->pegNip,
            'pendNmSekol'    =>  $request->pendNmSekol,
            'pendNoIjazah'    =>  $request->pendNoIjazah,
            'pendThnLls'    =>  $request->pendThnLls,
            'pendTglIjazah'    =>  $request->pendTglIjazah,
            'pendTempat'    =>  $request->pendTempat,
            'pendJurusan'    =>  $request->pendJurusan,
            'pendDokumen'    =>  $model['pendDokumen'],
            'pendTglUnggah' =>  date("Y-m-d H:i:s"),
        ]);

        $notification = array(
            'message' => 'Berhasil, data pendidikan berhasil ditambahkan!',
            'alert-type' => 'success'
        );
        return redirect()->route('guru.personal')->with($notification);
    }
}
