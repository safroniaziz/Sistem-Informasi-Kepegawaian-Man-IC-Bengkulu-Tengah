<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\TugasTambahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class RiwayatTugasTambahancontroller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        $tugastambahans = TugasTambahan::where('tgsNip',Auth::user()->pegNip)->get();
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
            'tgsNamajab'    =>  'required',
            'tgsTmt'    =>  'required',
            'tgsNoSk'    =>  'required',
            'tgsTglSk'    =>  'required',
        ],$messages,$attributes);

        $model = $request->all();
        $model['tgsDokumen'] = null;
        $slug_user = Str::slug(Auth::user()->pegNama);

        if ($request->hasFile('tgsDokumen')) {
            $model['tgsDokumen'] = $slug_user.'-'.Auth::user()->tgsNip.'-'.date('now').'.'.$request->tgsDokumen->getClientOriginalExtension();
            $request->tgsDokumen->move(public_path('/upload/dokumen_tugas_tambahan/'.$slug_user), $model['tgsDokumen']);
        }
        $tgsNoUrut = TugasTambahan::max('tgsNoUrut');
        if (empty($tgsNoUrut)) {
            $nourut = 1;
        } else {
            $nourut =   $tgsNoUrut+1;
        }
        TugasTambahan::create([
            'tgsNoUrut' => $nourut,
            'tgsNip'       =>  Auth::user()->pegNip,
            'tgsNamajab'    =>  $request->tgsNamajab,
            'tgsTmt'    =>  $request->tgsTmt,
            'tgsNoSk'    =>  $request->tgsNoSk,
            'tgsTglSk'    =>  $request->tgsTglSk,
            'tgsDokumen'    =>  $model['tgsDokumen'],
            'tgsTglUnggah' =>  date("Y-m-d H:i:s"),
        ]);

        $notification = array(
            'message' => 'Berhasil, data pendidikan berhasil ditambahkan!',
            'alert-type' => 'success'
        );
        return redirect()->route('guru.tugas_tambahan')->with($notification);
    }

    public function edit($tgsNoUrut){
        $data = TugasTambahan::where('tgsNoUrut',$tgsNoUrut)->first();
        return view('guru/tugas_tambahan.edit',compact('data'));
    }

    public function update(Request $request, $tgsNoUrut){
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
            'tgsDokumen'   =>  'Upload Dokumen ',
        ];
        $this->validate($request, [
           
            'tgsNamajab'    =>  'required',
            'tgsTmt'    =>  'required',
            'tgsNoSk'    =>  'required',
            'tgsTglSk'    =>  'required',
           
        ],$messages,$attributes);

        $model = $request->all();
        $model['tgsDokumen'] = null;
        $slug_user = Str::slug(Auth::user()->pegNama);
        $tgsDokumen = TugasTambahan::where('tgsNoUrut',$tgsNoUrut)->first();
        if ($request->hasFile('tgsDokumen')){
            if (!$tgsDokumen->tgsDokumen == NULL){
                unlink(public_path('/upload/dokumen_tugas_tambahan/'.$slug_user.'/'.$tgsDokumen->tgsDokumen));
            }
            $model['tgsDokumen'] = $slug_user.'-'.Auth::user()->tgsNoUrut.'-'.date('now').'.'.$request->tgsDokumen->getClientOriginalExtension();
            $request->tgsDokumen->move(public_path('/upload/dokumen_tugas_tambahan/'.$slug_user), $model['tgsDokumen']);
            TugasTambahan::where('tgsNoUrut',$tgsNoUrut)->update([
       
                'tgsNamajab'    =>  $request->tgsNamajab,
                'tgsTmt'    =>  $request->tgsTmt,
                'tgsNoSk'    =>  $request->tgsNoSk,
                'tgsTglSk'    =>  $request->tgsTglSk,
            
                'tgsDokumen'    =>  $model['tgsDokumen'],
            ]);

            $notification = array(
                'message' => 'Berhasil, data tugas tambahan berhasil ditambahkan!',
                'alert-type' => 'success'
            );
            return redirect()->route('guru.tugas_tambahan')->with($notification);
        }
        else{
            TugasTambahan::where('tgsNoUrut',$tgsNoUrut)->update([
                'tgsNoUrut'    =>  $request->tgsNoUrut,
                'tgsNamajab'    =>  $request->tgsNamajab,
                'tgsTmt'    =>  $request->tgsTmt,
                'tgsNoSk'    =>  $request->tgsNoSk,
                'tgsTglSk'    =>  $request->tgsTglSk,
                'tgsTtdPejabat'    =>  $request->tgsTtdPejabat,
            ]);

            $notification = array(
                'message' => 'Berhasil, data tugas tambahan berhasil ditambahkan!',
                'alert-type' => 'success'
            );
            return redirect()->route('guru.tugas_tambahan')->with($notification);
        }
    }

    public function delete($tgsNoUrut){
        TugasTambahan::where('tgsNoUrut',$tgsNoUrut)->delete();
        $notification = array(
            'message' => 'Berhasil, data tagus tambahan berhasil dihapus!',
            'alert-type' => 'success'
        );
        return redirect()->route('guru.tugas_tambahan')->with($notification);
    }

}
