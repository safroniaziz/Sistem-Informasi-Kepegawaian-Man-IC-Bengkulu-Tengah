<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Anak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class DataAnakController extends Controller
{
    public function index(){
        $anaks = Anak::all();
        return view('guru/data_anak.index',compact('anaks'));
    }

    public function add(){
        return view('guru/data_anak.add');
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
            'kelNama'   =>  'Golongan',
            'akStatus'   =>  'Tamatan Golongan',
            'akTglLhr'   =>  'Nomor SK',
            'akTpLhr'   =>  'Tanggal SK',
            'akTglLhr'   =>  'Masa Kerja Gol Tahun',
            'akStatusPend'   =>  'Masa Kerja Gol Bulan',
            'akPendAkhir'   =>  'Gaji Pokok ',
            'akAlsanTdkSekolah'   =>  'Gaji Pokok ',
            'akKerjaan'   =>  'Gaji Pokok ',
            'akNip'   =>  'Gaji Pokok ',
            'akNoBpjs'   =>  'Gaji Pokok ',
            'akIbu'   =>  'Gaji Pokok ',
            // 'goDokumen'   =>  'SK Kepangkatan ',
        ];
        $this->validate($request, [
            'kelNama'    =>  'required',
            'akStatus'    =>  'required',
            'akTglLhr'    =>  'required',
            'akTpLhr'    =>  'required',
            'akTglLhr'    =>  'required',
            'akStatusPend'    =>  'required',
            'akPendAkhir'    =>  'required',
            'akAlsanTdkSekolah'    =>  'required',
            'akKerjaan'    =>  'required',
            'akNip'    =>  'required',
            'akNoBpjs'    =>  'required',
            'akIbu'    =>  'required',
            // 'goDokumen'    =>  'required|mimes:doc,pdf,docx,jpg|max:1000',
        ],$messages,$attributes);

        // $model = $request->all();
        // $model['goDokumen'] = null;
        // $slug_user = Str::slug(Auth::user()->pegNama);

        // if ($request->hasFile('goDokumen')) {
        //     $model['goDokumen'] = $slug_user.'-'.Auth::user()->pegNip.'-'.date('now').'.'.$request->goDokumen->getClientOriginalExtension();
        //     $request->goDokumen->move(public_path('/upload/dokumen_kepangkatan/'.$slug_user), $model['goDokumen']);
        // }

        Anak::create([
            'akNip'       =>  Auth::user()->pegNip,
            'kelNama'    =>  $request->kelNama,
            'akStatus'    =>  $request->akStatus,
            'akTglLhr'    =>  $request->akTglLhr,
            'akTpLhr'    =>  $request->akTpLhr,
            'akTglLhr'    =>  $request->akTglLhr,
            'akStatusPend'    =>  $request->akStatusPend,
            'akPendAkhir'    =>  $request->akPendAkhir,
            'akAlsanTdkSekolah'    =>  $request->akAlsanTdkSekolah,
            'akKerjaan'    =>  $request->akKerjaan,
            'akNoBpjs'    =>  $request->akNoBpjs,
            'akIbu'    =>  $request->akIbu,
            // 'goDokumen'    =>  $model['goDokumen'],
            'goTglUnggah' =>  date("Y-m-d H:i:s"),
        ]);

        $notification = array(
            'message' => 'Berhasil, data pendidikan berhasil ditambahkan!',
            'alert-type' => 'success'
        );
        return redirect()->route('guru.data_anak')->with($notification);
    }
}
