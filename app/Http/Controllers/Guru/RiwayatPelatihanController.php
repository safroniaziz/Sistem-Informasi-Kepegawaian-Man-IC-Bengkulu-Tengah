<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Pelatihan;
use App\Models\RefJendiklat;

use Illuminate\Support\Facades\Auth;


class RiwayatPelatihanController extends Controller
{
    public function index(){
        $pelatihans = Pelatihan::where('pltnip',Auth::user()->pegNip)->get();
        return view('guru/pelatihan.index',compact('pelatihans'));
    }

    public function add(){
        $jendiklat = DB::table('refjendiklat')->select('jendikkd','jendiknama')->get();
        $diklat = DB::table('refdiklat')->select('dktkddiklat','dktnmdiklat')->get();
        $pelatihan = DB::table('tbpelatihan')->select('pltKddiklat','pltNmdiklat','pltKddiklat2','pltNmdiklat2','pltTglmulai','pltTglakhir','pltnosertifikat','pltThnsertifikat','pltTempat','pltDokumen')->get();
      
        return view('guru/pelatihan.add',compact('diklat','pelatihan','jendiklat'));


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
            'pltNmdiklat'   =>  'Nama Diklat',
            'pltKddiklat'   =>  'Nomor Diklat',
            'pltNmdiklat2'   =>  'Nama Diklat',
            'pltKddiklat2'   =>  'KOde Diklat',
            'pltTglmulai'   =>  'Tanggal Awal Diklat',
            'pltTglakhir'   =>  'Tanggal Akhir Diklat',
            'pltnosertifikat'   =>  'Nomor Sertifikasi',
            'pltThnsertifikat'   =>  'Tahun Sertifikat Diklat',
            'pltTempat'   =>  'Tempat Diklat',
            'pltKet'   =>  'Tanggal Diklat',
            'pltDokumen'   =>  'Upload Diklat ',
        ];
        $this->validate($request, [
     
        ],$messages,$attributes);

        $model = $request->all();
        $model['pltDokumen'] = null;
        $slug_user = Str::slug(Auth::user()->pegNama);

        if ($request->hasFile('pltDokumen')) {
            $model['pltDokumen'] = $slug_user.'-'.Auth::user()->pegNip.'-'.date('now').'.'.$request->pltDokumen->getClientOriginalExtension();
            $request->pltDokumen->move(public_path('/upload/dokumen_pelatihan/'.$slug_user), $model['pltDokumen']);
        }
        $jendiklat = RefJendiklat::where('jendikkd',$request->jendiklat)->first();

        Pelatihan::create([
            'pltnip'       =>  Auth::user()->pegNip,
            'pltKddiklat'    =>  $request->jendiklat,
            'pltNmdiklat'    =>  $jendiklat->jendiknama,
            'pltKddiklat2'    =>  $request->pltKddiklat2,
            'pltNmdiklat2'    =>  $request->pltNmdiklat2,
            'pltTglmulai'    =>  $request->pltTglmulai,
            'pltTglakhir'    =>  $request->pltTglakhir,
            'pltnosertifikat'    =>  $request->pltnosertifikat,
            'pltThnsertifikat'    =>  $request->pltThnsertifikat,
            'pltTempat'    =>  $request->pltTempat,
            'pltDokumen'    =>  $model['pltDokumen'],
            'pltTglUnggah' =>  date("Y-m-d H:i:s"),
        ]);

        $notification = array(
            'message' => 'Berhasil, data pelatihan berhasil ditambahkan!',
            'alert-type' => 'success'
        );
        return redirect()->route('guru.pelatihan')->with($notification);
    }

    public function edit($pltNourt){
        $data = Pelatihan::where('pltNourt',$pltNourt)->first();
        $jendiklat = DB::table('refjendiklat')->select('jendikkd','jendiknama')->get();
        $diklat = DB::table('refdiklat')->select('dktkddiklat','dktnmdiklat')->get();
        $pelatihan = DB::table('tbpelatihan')->select('pltKddiklat','pltNmdiklat','pltKddiklat2','pltNmdiklat2','pltTglmulai','pltTglakhir','pltnosertifikat','pltThnsertifikat','pltTempat','pltDokumen')->get();
      

        return view('guru/pelatihan.edit',compact('data','diklat','pelatihan','jendiklat'));
    }

    public function update(Request $request, $pltNourt){
        $messages = [
            'required' => ':attribute harus diisi',
            'numeric' => ':attribute harus angka',
            'mimes' => 'The :attribute harus berupa file: :values.',
            'max' => [
                'file' => ':attribute tidak boleh lebih dari :max kilobytes.',
            ],
        ];
        $attributes = [
            'pltNmdiklat'   =>  'Nama Diklat',
            'pltKddiklat'   =>  'Nomor Diklat',
            'pltNmdiklat2'   =>  'Nama Diklat',
            'pltKddiklat2'   =>  'KOde Diklat',
            'pltTglmulai'   =>  'Tanggal Awal Diklat',
            'pltTglakhir'   =>  'Tanggal Akhir Diklat',
            'pltnosertifikat'   =>  'Nomor Sertifikasi',
            'pltThnsertifikat'   =>  'Tahun Sertifikat Diklat',
            'pltTempat'   =>  'Tempat Diklat',
            'pltKet'   =>  'Tanggal Diklat',
            'pltDokumen'   =>  'Upload Diklat ',
        ];
        $this->validate($request, [
            // 'pltNmSekol'    =>  'required',
            // 'pltNoIjazah'    =>  'required',
            // 'pltThnLls'    =>  'required',
            // 'pltTglIjazah'    =>  'required',
            // 'pltTempat'    =>  'required',
            // 'pltJurusan'    =>  'required',
            'pltDokumen'    =>  'mimes:doc,pdf,docx,jpg|max:1000',
        ],$messages,$attributes);

        $model = $request->all();
        $model['pltDokumen'] = null;
        $slug_user = Str::slug(Auth::user()->pegNama);
        $pltDokumen = Pelatihan::where('pltNourt',$pltNourt)->first();
        $jendiklat = RefJendiklat::where('jendikkd',$request->jendiklat)->first();

        if ($request->hasFile('pltDokumen')){
            if (!$pltDokumen->pltDokumen == NULL){
                unlink(public_path('/upload/dokumen_pelatihan/'.$slug_user.'/'.$pltDokumen->pltDokumen));
            }
            $model['pltDokumen'] = $slug_user.'-'.Auth::user()->pegNip.'-'.date('now').'.'.$request->pltDokumen->getClientOriginalExtension();
            $request->pltDokumen->move(public_path('/upload/dokumen_pelatihan/'.$slug_user), $model['pltDokumen']);
           
            
            Pelatihan::where('pltNourt',$pltNourt)->update([
                'pltnip'       =>  Auth::user()->pegNip,
                'pltKddiklat'    =>  $request->jendiklat,
                'pltNmdiklat'    =>  $jendiklat->jendiknama,
                'pltKddiklat2'    =>  $request->pltKddiklat2,
                'pltNmdiklat2'    =>  $request->pltNmdiklat2,
                'pltTglmulai'    =>  $request->pltTglmulai,
                'pltTglakhir'    =>  $request->pltTglakhir,
                'pltnosertifikat'    =>  $request->pltnosertifikat,
                'pltThnsertifikat'    =>  $request->pltThnsertifikat,
                'pltTempat'    =>  $request->pltTempat,
                'pltDokumen'    =>  $model['pltDokumen'],
                'pltTglUnggah' =>  date("Y-m-d H:i:s"),
            ]);
    
            $notification = array(
                'message' => 'Berhasil, data pelatihan berhasil ditambahkan!',
                'alert-type' => 'success'
            );
            return redirect()->route('guru.pelatihan')->with($notification);
        }
        else{
            Pelatihan::where('pltNourt',$pltNourt)->update([
                'pltnip'       =>  Auth::user()->pegNip,
                'pltKddiklat'    =>  $request->jendiklat,
                'pltNmdiklat'    =>  $jendiklat->jendiknama,
                'pltKddiklat2'    =>  $request->pltKddiklat2,
                'pltNmdiklat2'    =>  $request->pltNmdiklat2,
                'pltTglmulai'    =>  $request->pltTglmulai,
                'pltTglakhir'    =>  $request->pltTglakhir,
                'pltnosertifikat'    =>  $request->pltnosertifikat,
                'pltThnsertifikat'    =>  $request->pltThnsertifikat,
                'pltTempat'    =>  $request->pltTempat,
                'pltDokumen'    =>  $model['pltDokumen'],
                'pltTglUnggah' =>  date("Y-m-d H:i:s"),
            ]);
    
            $notification = array(
                'message' => 'Berhasil, data pelatihan berhasil ditambahkan!',
                'alert-type' => 'success'
            );
            return redirect()->route('guru.pelatihan')->with($notification);
        }
    }
    

    public function delete($pltNourt){
        Pelatihan::where('pltNourt',$pltNourt)->delete();
        $notification = array(
            'message' => 'Berhasil, data pendidikan berhasil dihapus!',
            'alert-type' => 'success'
        );
        return redirect()->route('guru.pelatihan')->with($notification);
    }
    
}
