<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\RiwayatJabatan;
use App\Models\JenJab;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class RiwayatJabatanFungsionalController extends Controller
{
    public function index(){
        $jabatans = RiwayatJabatan::where('jfNip',Auth::user()->pegNip)->get();
        return view('guru/jabatan_fungsional.index',compact('jabatans'));
    }

    public function add(){
        $bidangilmu = DB::table('tbmapel')->select('mapKdMapel','mapNmMapel')->get();
        $jenjab = DB::table('tbjenjab')->select('jabKdJab','jabNama')->get();
        return view('guru/jabatan_fungsional.add',compact('bidangilmu','jenjab'));
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
            'jfTmtJab'   =>  'Tamatan',
            'jfNoSk'   =>  'Nomor SK',
            'jfTglSk'   =>  'Tanggal SK',
            'jfPejabat'   =>  'Pejabat Tertanda',
            'jfKdunit'   =>  'Bidang Ilmu ',
            'jfDokumen'   =>  'Upload Dokumen ',
        ];
        $this->validate($request, [
            // 'jfKdJenisjab'    =>  'required',
            // // 'jfKdjab'    =>  'required',
            // 'jfTmtJab'    =>  'required',
            // 'jfNoSk'    =>  'required',
            // 'jfTglSk'    =>  'required',
          
    
            'jfDokumen'    =>  'required|mimes:doc,pdf,docx,jpg|max:1000',
        ],$messages,$attributes);

        $model = $request->all();
        $model['jfDokumen'] = null;
        $slug_user = Str::slug(Auth::user()->pegNama);

        if ($request->hasFile('jfDokumen')) {
            $model['jfDokumen'] = $slug_user.'-'.Auth::user()->jfNip.'-'.date('now').'.'.$request->jfDokumen->getClientOriginalExtension();
            $request->jfDokumen->move(public_path('/upload/dokumen_jabatan_fungsional/'.$slug_user), $model['jfDokumen']);
        }
        $jenjab = JenJab::where('jabKdJab',$request->jenjab)->first();
       
        RiwayatJabatan::create([
            'jfNip'       =>  Auth::user()->pegNip,
            'jfKdjab'    =>  $request->jenjab,
            'jfNamajab'    =>  $jenjab->jabNama,
            'jfTmtjab'    =>  $request->jfTmtjab,
            'jfNoSk'    =>  $request->jfNoSk,
            'jfTglSk'    =>  $request->jfTglSk,
            // 'jfPejabat'    =>  $request->jfPejabat,
            // 'jfKdunit'    =>  $request->jfKdunit,
            'jfDokumen'    =>  $model['jfDokumen'],
            'jfTglUnggah' =>  date("Y-m-d H:i:s"),
        ]);

        $notification = array(
            'message' => 'Berhasil, data pendidikan berhasil ditambahkan!',
            'alert-type' => 'success'
        );
        return redirect()->route('guru.jabatan_fungsional')->with($notification);
    }

    public function edit($jfNoUrt){
        $data = RiwayatJabatan::where('jfNoUrt',$jfNoUrt)->first();
        $bidangilmu = DB::table('tbmapel')->select('mapKdMapel','mapNmMapel')->get();
        $jenjab = DB::table('tbjenjab')->select('jabKdJab','jabNama')->get();
        return view('guru/jabatan_fungsional.edit',compact('bidangilmu','jenjab','data'));
    }
    public function update(Request $request, $jfNoUrt){
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
            'jfTmtJab'   =>  'Tamatan',
            'jfNoSk'   =>  'Nomor SK',
            'jfTglSk'   =>  'Tanggal SK',
            'jfPejabat'   =>  'Pejabat Tertanda',
            'jfKdunit'   =>  'Bidang Ilmu ',
            'jfDokumen'   =>  'Upload Dokumen ',
        ];
        $this->validate($request, [
      
        ],$messages,$attributes);

        $model = $request->all();
        $model['jfDokumen'] = null;
        $slug_user = Str::slug(Auth::user()->pegNama);
        $jfDokumen = RiwayatJabatan::where('jfNoUrt',$jfNoUrt)->first();
        if ($request->hasFile('jfDokumen')){
            if (!$jfDokumen->jfDokumen == NULL){
                unlink(public_path('/upload/dokumen_jabatan_fungsional/'.$slug_user.'/'.$jfDokumen->jfDokumen));
            }
            $model['jfDokumen'] = $slug_user.'-'.Auth::user()->jfNoUrt.'-'.date('now').'.'.$request->jfDokumen->getClientOriginalExtension();
            $request->jfDokumen->move(public_path('/upload/dokumen_jabatan_fungsional/'.$slug_user), $model['jfDokumen']);
         
            $jenjab = JenJab::where('jabKdJab',$request->jenjab)->first();

            RiwayatJabatan::where('jfNoUrt',$jfNoUrt)->update([
            
                'jfKdjab'    =>  $request->jenjab,
            'jfNamajab'    =>  $jenjab->jabNama,
            
                'jfTmtJab'    =>  $request->jfTmtJab,
                'jfNoSk'    =>  $request->jfNoSk,
                'jfTglSk'    =>  $request->jfTglSk,
                // 'jfPejabat'    =>  $request->jfPejabat,
                // 'jfKdunit'    =>  $request->jfKdunit,
               
                'jfTglUnggah' =>  date("Y-m-d H:i:s"),
                'jfDokumen'    =>  $model['jfDokumen'],
            ]);

            $notification = array(
                'message' => 'Berhasil, data jabatan_fungsional berhasil ditambahkan!',
                'alert-type' => 'success'
            );
            return redirect()->route('guru.jabatan_fungsional')->with($notification);
        }
        else{
            $jenjab = JenJab::where('jabKdJab',$request->jenjab)->first();
            RiwayatJabatan::where('jfNoUrt',$jfNoUrt)->update([
            'jfKdJenisjab'    =>  $request->jfKdJenisjab,
            'jfKdjab'    =>  $request->jenjab,
            'jfNamajab'    =>  $jenjab->jabNama,
            'jfTmtJab'    =>  $request->jfTmtJab,
            'jfNoSk'    =>  $request->jfNoSk,
            'jfTglSk'    =>  $request->jfTglSk,
         
      
            ]);

            $notification = array(
                'message' => 'Berhasil, data jabatan_fungsional berhasil ditambahkan!',
                'alert-type' => 'success'
            );
            return redirect()->route('guru.jabatan_fungsional')->with($notification);
        }}
        public function delete($jfNoUrt){
            RiwayatJabatan::where('jfNoUrt',$jfNoUrt)->delete();
            $notification = array(
                'message' => 'Berhasil, data jabatan_fungsional berhasil dihapus!',
                'alert-type' => 'success'
            );
            return redirect()->route('guru.jabatan_fungsional')->with($notification);
        }
}
