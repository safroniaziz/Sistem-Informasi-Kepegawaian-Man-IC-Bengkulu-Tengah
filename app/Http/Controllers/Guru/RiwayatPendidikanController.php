<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Pendidikan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class RiwayatPendidikanController extends Controller
{
    public function index(){
        $pendidikans = Pendidikan::all();
        return view('guru/pendidikan.index',compact('pendidikans'));
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
            'pendThnLls'   =>  'Tahun Lulus',
            'pendTglIjazah'   =>  'Tanggal Ijazah',
            'pendTempat'   =>  'Tempat Pendidikan',
            'pendJurusan'   =>  'Pendidikan Jurusan',
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

        $model = $request->all();
        $model['pendDokumen'] = null;
        $slug_user = Str::slug(Auth::user()->pegNama);

        if ($request->hasFile('pendDokumen')) {
            $model['pendDokumen'] = $slug_user.'-'.Auth::user()->pegNip.'-'.date('now').'.'.$request->pendDokumen->getClientOriginalExtension();
            $request->pendDokumen->move(public_path('/upload/dokumen_pendidikan'.$slug_user), $model['pendDokumen']);
        }

        Pendidikan::create([
            'pendNip'       =>  Auth::user()->pegNama,
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
        return redirect()->route('guru.pendidikan')->with($notification);
    }
}
