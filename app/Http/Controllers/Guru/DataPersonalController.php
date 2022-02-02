<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Agama;
use App\Models\Kawin;
use App\Models\JenJab;
use App\Models\JenisJab;
use App\Models\Golongan;
use App\Models\Pegawai;
use App\Models\RefStapeg;
use App\Models\KedHukum;
use App\Models\RefPendidikan;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class DataPersonalController extends Controller
{
    public function index(){
        $bidangilmu = DB::table('tbmapel')->select('mapKdMapel','mapNmMapel')->get();
        $jabatan = DB::table('tbjenjab')->select('jabKdJab','jabNama')->get();
        $kawin = DB::table('refkawin')->select('KODE','KET')->get();
        $agama = Agama::all();
        $stapeg = RefStapeg::all();
        $kedkum = KedHukum::all();
        $jabatan = JenJab::all();
        $golongan = Golongan::all();
        $refpendidikan = RefPendidikan::all();

        $jenisjabatan = DB::table('tbjenisjab')->select('jenKdJenJab','jenNmjenJab')->get();
        $data = Pegawai::leftJoin('refagama','refagama.KODE','tbpegawai.pegAgama')
                        ->leftJoin('refstapeg','refstapeg.KODE','tbpegawai.pegStapeg')
                        ->leftJoin('tbjenisjab','tbjenisjab.jenKdJenJab','tbpegawai.pegKdJenisjab')
                        ->leftJoin('refgol','refgol.KODE','tbpegawai.pegGolTerakhir')
                        ->leftJoin('refpendidikan','refpendidikan.pendTingkat','tbpegawai.pegPendAkhir')

                        ->where('pegNip',Auth::user()->pegNip)->first();

        return view('guru/personal.index',compact('bidangilmu','jabatan','kawin','agama','stapeg','kedkum','jenisjabatan','golongan','refpendidikan','data'));
    }

    public function add(){
        $bidangilmu = DB::table('tbmapel')->select('mapKdMapel','mapNmMapel')->get();
        $jabatan = DB::table('tbjenjab')->select('jabKdJab','jabNama')->get();
        $kawin = DB::table('refkawin')->select('KODE','KET')->get();
        return view('guru/personal.add',compact('bidangilmu','jabatan','kawin'));


    }
    // public function post(Request $request){
    //     $messages = [
    //         'required' => ':attribute harus diisi',
    //         'numeric' => ':attribute harus angka',
    //         'mimes' => 'The :attribute harus berupa file: :values.',
    //         'max' => [
    //             'file' => ':attribute tidak boleh lebih dari :max kilobytes.',
    //         ],
    //     ];
    //     $attributes = [
    //         'pegNmSekol'   =>  'Nama Sekolah',
    //         'pegNoIjazah'   =>  'Nomor Ijazah',
    //         'pegThnLls'   =>  'Tahun Lulus',
    //         'pegTglIjazah'   =>  'Tanggal Ijazah',
    //         'pegTempat'   =>  'Tempat Pegawai',
    //         'pegJurusan'   =>  'Pegawai Jurusan',
    //         'pegDokumen'   =>  'Upload Ijazah ',
    //     ];
    //     $this->validate($request, [
    //         'pegNmSekol'    =>  'required',
    //         'pegNoIjazah'    =>  'required',
    //         'pegThnLls'    =>  'required',
    //         'pegTglIjazah'    =>  'required',
    //         'pegTempat'    =>  'required',
    //         'pegJurusan'    =>  'required',
    //         'pegDokumen'    =>  'required|mimes:doc,pdf,docx,jpg|max:1000',
    //     ],$messages,$attributes);

    //     // $model = $request->all();
    //     // $model['pegDokumen'] = null;
    //     // $slug_user = Str::slug(Auth::user()->pegNama);

    //     // if ($request->hasFile('pegDokumen')) {
    //     //     $model['pegDokumen'] = $slug_user.'-'.Auth::user()->pegNip.'-'.date('now').'.'.$request->pegDokumen->getClientOriginalExtension();
    //     //     $request->pegDokumen->move(public_path('/upload/dokumen_pegidikan/'.$slug_user), $model['pegDokumen']);
    //     // }

    //     Pegawai::create([
    //         'pegNip'       =>  Auth::user()->pegNip,
    //         'pegNmSekol'    =>  $request->pegNmSekol,
    //         'pegNoIjazah'    =>  $request->pegNoIjazah,
    //         'pegThnLls'    =>  $request->pegThnLls,
    //         'pegTglIjazah'    =>  $request->pegTglIjazah,
    //         'pegTempat'    =>  $request->pegTempat,
    //         'pegJurusan'    =>  $request->pegJurusan,
    //         'pegDokumen'    =>  $model['pegDokumen'],
    //         'pegTglUnggah' =>  date("Y-m-d H:i:s"),
    //     ]);

    //     $notification = array(
    //         'message' => 'Berhasil, data pegidikan berhasil ditambahkan!',
    //         'alert-type' => 'success'
    //     );
    //     return redirect()->route('guru.personal')->with($notification);
    // }
    public function edit($pegNip){
        $data = Pegawai::where('pegNip',$pegNip)->first();
        return view('guru/personal.edit',compact('data'));
    }
    public function update(Request $request, $pegNip){
        $messages = [
            'required' => ':attribute harus diisi',
            'numeric' => ':attribute harus angka',
            'mimes' => 'The :attribute harus berupa file: :values.',
            'max' => [
                'file' => ':attribute tidak boleh lebih dari :max kilobytes.',
            ],
        ];
        $attributes = [
            'pegPoto'   =>  'Foto',
        ];
        $this->validate($request, [
            'pegPoto'    =>  'required|mimes:jpg,png|max:1000',
            'pegKetKawin'   =>  'required'
        ],$messages,$attributes);
        
        $ketKawin = Kawin::where('KODE',$request->pegKetKawin)->first();
        $kedkum = KedHukum::where('kedIdHukum',$request->pegKedHukum)->first();
        // $agama = Agama::where('KODE',$request->pegAgama)->first();
        // $stapeg = RefStapeg::where('KODE',$request->pegStapeg)->first();
        // $golongan = Golongan::where('KODE',$request->pegGolTerakhir)->first();
        // $refpendidikan = RefPendidikan::where('pendTingkat',$request->pegPendAkhir)->first();
        // $golongan = Golongan::where('KODE',$request->pegGolTerakhir)->first();
        // $jenisjabatan = JenisJab::where('jenKdJenJab',$request->pegKdJenisjab)->first();
        $personal = Pegawai::where('pegNip',$pegNip)->select('pegPoto')->first();
        $slug_user = Str::slug(Auth::user()->pegNama);
        $slug_time = $time_now = date("Y-m-d h:i:s a");
        if ($request->hasFile('pegPoto')){
            if (!$personal->pegPoto == NULL){
                unlink(public_path('/upload/pas_foto/'.$personal->pegPoto));
            }
            $model['foto'] = $slug_user.'-'.Auth::user()->pegNip.'-'.$slug_time.'.'.$request->pegPoto->getClientOriginalExtension();
            $request->pegPoto->move(public_path('/upload/pas_foto/'), $model['foto']);
        // return $ketKawin;
            Pegawai::where('pegNip',$pegNip)->update([
            'pegNip'       =>  Auth::user()->pegNip,
            'pegGlrDpn'   =>  $request->pegGlrDpn,
            'pegNama'  =>  $request->pegNama,
            'pegGlrBlg'  =>  $request->pegGlrBlg,
            'pegTpLhr'  =>  $request->pegTpLhr,
            'pegTglLhr'   =>  $request->pegTglLhr,
            'pegJenkel'  =>  $request->pegJenkel,
            'pegKetkawin'  =>  $ketKawin->KET,
            'pegKdkawin'  =>  $request->pegKetKawin,
            'pegTmtCpns'  =>  $request->pegTmtCpns,
            'pegTmtPns'  =>  $request->pegTmtPns,
            'pegGolTerakhir'  =>  $request->pegGolTerakhir,
            'pegTmtGol'  =>  $request->pegTmtGol,
            'pegMaskerthn'  =>  $request->pegMaskerthn,
            'pegMaskerbln'  =>  $request->pegMaskerbln,
            'pegPendAkhir'  =>  $request->pegPendAkhir,
            'pegThnLulus'  =>  $request->pegThnLulus,
            'pegJurusan'  =>  $request->pegJurusan,
            'pegTempat'  =>  $request->pegTempat,
            'pegAgama'  =>  $request->pegAgama,
            'pegStapeg'  =>  $request->pegStapeg,
            'pegKedHukum'  =>  $kedkum->kedNmHukum,
            'pegIdKedHukum'  =>  $request->pegKedHukum,
            'pegJenisKepeg'  =>  $request->pegJenisKepeg,
            // 'pegKdJenKepeg'  =>  $request->pegKdJenKepeg,
            'pegNmJabatan'  =>  $request->pegNmJabatan,
            // 'pegKdJab'  =>  $request->pegKdJab,
            'pegMasapensiun'  =>  $request->pegMasapensiun,
            'pegTmtJab'  =>  $request->pegTmtJab,
            'pegKdJenisjab' =>  $request->pegKdJenisjab,
            'pegNamaTgsTmbhan'  =>  $request->pegNamaTgsTmbhan,
            // 'pegIdTgsTmbhan'  =>  $request->pegIdTgsTmbhan,
            'pegTmtTugasTmbhan'  =>  $request->pegTmtTugasTmbhan,
            'pegNoKarpeg'  =>  $request->pegNoKarpeg,
            'pegSertifikasi'  =>  $request->pegSertifikasi,
            'pegNosertifikasi'  =>  $request->pegNosertifikasi,
            'pegNidn'  =>  $request->pegNidn,
            'pegNamaSubUnit' =>  $request->pegNamaSubUnit,
            // 'pegKdUnitKerja'  =>  $request->pegKdUnitKerja,
            'pegNpwp'  =>  $request->pegNpwp,
            'pegAlamat'  =>  $request->pegAlamat,
            'pegRt_Rw'  =>  $request->pegRt_Rw,
            'pegDesa'  =>  $request->pegDesa,
            'pegKecamatan'  =>  $request->pegKecamatan,
            'pegKabupaten'  =>  $request->pegKabupaten,
            'pegProvinsi'  =>  $request->pegProvinsi,
            'pegNoHp'  =>  $request->pegNoHp,
            'pegNik'  =>  $request->pegNik,
            'pegEmail'  =>  $request->pegEmail,
            'pegPoto'  =>  $model['foto'],
            // 'pegHobi'  =>  $request->
            // 'pegPoto'  =>  $request->
            // 'pegIdpasword'  =>  $request->
            'pegTglUbah'  =>  $request->pegTglUbah,
            ]);

            $notification = array(
                'message' => 'Berhasil, data kepangkatan berhasil ditambahkan!',
                'alert-type' => 'success'
            );
            return redirect()->route('guru.personal')->with($notification);
        }
    }

    public function delete($pegNip){
        Pegawai::where('pegNip',$pegNip)->delete();
        $notification = array(
            'message' => 'Berhasil, data data anak berhasil dihapus!',
            'alert-type' => 'success'
        );
        return redirect()->route('guru.personal')->with($notification);
    }
}
