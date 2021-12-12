<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Golongan;
use App\Models\RiwayatGolongan;
use App\Models\RiwayatJabatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class RiwayatKepangkatanController extends Controller
{
    public function index(){
        $golongans = RiwayatGolongan::where('goNip',Auth::user()->pegNip)->get();
        return view('guru/kepangkatan.index',compact('golongans'));
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
            // 'goGapok'   =>  'Gaji Pokok ',
            'goDokumen'   =>  'SK Kepangkatan ',
        ];
        $this->validate($request, [
            'goGol'    =>  'required',
            'goTmtGol'    =>  'required',
            'goNoSk'    =>  'required',
            'goTglSk'    =>  'required',
            'goMaskerThn'    =>  'required|numeric',
            'goMaskerBln'    =>  'required|numeric',
            // 'goGapok'    =>  'required|numeric',
            'goDokumen'    =>  'required|mimes:doc,pdf,docx,jpg|max:1000',
        ],$messages,$attributes);

        $model = $request->all();
        $model['goDokumen'] = null;
        $slug_user = Str::slug(Auth::user()->pegNama);

        if ($request->hasFile('goDokumen')) {
            $model['goDokumen'] = $slug_user.'-'.Auth::user()->goNoUrt.'-'.date('now').'.'.$request->goDokumen->getClientOriginalExtension();
            $request->goDokumen->move(public_path('/upload/dokumen_kepangkatan/'.$slug_user), $model['goDokumen']);
        }

        RiwayatGolongan::create([
            'goNip'       =>  Auth::user()->pegNip,
            'goGol'    =>  $request->goGol,
            'goTmtGol'    =>  $request->goTmtGol,
            'goNoSk'    =>  $request->goNoSk,
            'goTglSk'    =>  $request->goTglSk,
            'goMaskerThn'    =>  $request->goMaskerThn,
            'goMaskerBln'    =>  $request->goMaskerBln,
            // 'goGapok'    =>  $request->goGapok,
            'goDokumen'    =>  $model['goDokumen'],
            'goTglUnggah' =>  date("Y-m-d H:i:s"),
        ]);

        $notification = array(
            'message' => 'Berhasil, data pendidikan berhasil ditambahkan!',
            'alert-type' => 'success'
        );
        return redirect()->route('guru.kepangkatan')->with($notification);
    }

    public function edit($goNoUrt){
        $data = RiwayatGolongan::where('goNoUrt',$goNoUrt)->first();
        return view('guru/kepangkatan.edit',compact('data'));
    }

    public function update(Request $request, $goNoUrt){
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
            // 'goGapok'   =>  'Gaji Pokok ',
            'goDokumen'   =>  'SK Kepangkatan ',
        ];
        $this->validate($request, [
            'goGol'    =>  'required',
            'goTmtGol'    =>  'required',
            'goNoSk'    =>  'required',
            'goTglSk'    =>  'required',
            'goMaskerThn'    =>  'required|numeric',
            'goMaskerBln'    =>  'required|numeric',
            // 'goGapok'    =>  'required|numeric',
            'goDokumen'    =>  'mimes:doc,pdf,docx,jpg|max:1000',
        ],$messages,$attributes);

        $model = $request->all();
        $model['goDokumen'] = null;
        $slug_user = Str::slug(Auth::user()->pegNama);
        $goDokumen = RiwayatGolongan::where('goNoUrt',$goNoUrt)->first();
        if ($request->hasFile('goDokumen')){
            if (!$goDokumen->goDokumen == NULL){
                unlink(public_path('/upload/dokumen_kepangkatan/'.$slug_user.'/'.$goDokumen->goDokumen));
            }
            $model['goDokumen'] = $slug_user.'-'.Auth::user()->goNoUrt.'-'.date('now').'.'.$request->goDokumen->getClientOriginalExtension();
            $request->goDokumen->move(public_path('/upload/dokumen_kepangkatan/'.$slug_user), $model['goDokumen']);
            RiwayatGolongan::where('goNoUrt',$goNoUrt)->update([
                'goGol'    =>  $request->goGol,
                'goTmtGol'    =>  $request->goTmtGol,
                'goNoSk'    =>  $request->goNoSk,
                'goTglSk'    =>  $request->goTglSk,
                'goMaskerThn'    =>  $request->goMaskerThn,
                'goMaskerBln'    =>  $request->goMaskerBln,
                // 'goGapok'    =>  $request->goGapok,
                'goDokumen'    =>  $model['goDokumen'],
            ]);

            $notification = array(
                'message' => 'Berhasil, data kepangkatan berhasil ditambahkan!',
                'alert-type' => 'success'
            );
            return redirect()->route('guru.kepangkatan')->with($notification);
        }
        else{
            RiwayatGolongan::where('goNoUrt',$goNoUrt)->update([
                'goGol'    =>  $request->goGol,
                'goTmtGol'    =>  $request->goTmtGol,
                'goNoSk'    =>  $request->goNoSk,
                'goTglSk'    =>  $request->goTglSk,
                'goMaskerThn'    =>  $request->goMaskerThn,
                'goMaskerBln'    =>  $request->goMaskerBln,
                // 'goGapok'    =>  $request->goGapok,
            ]);

            $notification = array(
                'message' => 'Berhasil, data kepangkatan berhasil ditambahkan!',
                'alert-type' => 'success'
            );
            return redirect()->route('guru.kepangkatan')->with($notification);
        }
    }

    public function delete($goNoUrt){
        RiwayatGolongan::where('goNoUrt',$goNoUrt)->delete();
        $notification = array(
            'message' => 'Berhasil, data kepangkatan berhasil dihapus!',
            'alert-type' => 'success'
        );
        return redirect()->route('guru.kepangkatan')->with($notification);
    }
}
