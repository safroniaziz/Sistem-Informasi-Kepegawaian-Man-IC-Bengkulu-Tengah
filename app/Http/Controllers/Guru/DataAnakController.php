<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Anak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class DataAnakController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        $anaks = Anak::where('akNip',Auth::user()->pegNip)->get();
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
            'akNama'   =>  'Nama',
            'akStatus'   =>  'Status Anak',
            'akJenkel'   =>  'Jenis Kelamin',
            'akTpLhr'   =>  'Tempat Lahir',
            'akTglLhr'   =>  'Tanggal Lahir',
            'akStatusPend'   =>  'Status Pendidikan',
            'akPendAkhir'   =>  'Pendidikan Terakhir ',
            'akAlsanTdkSekolah'   =>  'Alasan Tidak Sekolah ',
            'akKerjaan'   =>  'Pekerjaan',
            'akNip'   =>  'NIP',
            'akNoBpjs'   =>  'PJS No',
            'akIbu'   =>  'Nama Ibu',
        ];
        $this->validate($request, [
            // 'akNama'    =>  'required',
            // 'akStatus'    =>  'required',
            // 'akJenkel'    =>  'required',
            // 'akTpLhr'    =>  'required',
            // 'akTglLhr'    =>  'required',
            // 'akStatusPend'    =>  'required',
            // 'akPendAkhir'    =>  'required',
            // 'akAlsanTdkSekolah'    =>  'required',
            // 'akKerjaan'    =>  'required',
            // 'akNip'    =>  'required',
            // 'akNoBpjs'    =>  'required',
            // 'akIbu'    =>  'required',
        ],$messages,$attributes);

        Anak::create([
            // 'akNoUrt'       =>  Auth::user()->pegNoUrt,
            'akNip'       =>  Auth::user()->pegNip,
            
            'akNama'    =>  $request->akNama,
            'akStatus'    =>  $request->akStatus,
            'akJenkel'    =>  $request->akJenkel,
            'akTpLhr'    =>  $request->akTpLhr,
            'akTglLhr'    =>  $request->akTglLhr,
            'akStatusPend'    =>  $request->akStatusPend,
            'akPendAkhir'    =>  $request->akPendAkhir,
            'akAlsanTdkSekolah'    =>  $request->akAlsanTdkSekolah,
            'akKerjaan'    =>  $request->akKerjaan,
            'akNoBpjs'    =>  $request->akNoBpjs,
            'akIbu'    =>  $request->akIbu,
            'goTglUnggah' =>  date("Y-m-d H:i:s"),
        ]);

        $notification = array(
            'message' => 'Berhasil, data anak berhasil ditambahkan!',
            'alert-type' => 'success'
        );
        return redirect()->route('guru.data_anak')->with($notification);
    }

    public function edit($akNoUrt){
        $data = Anak::where('akNoUrt',$akNoUrt)->first();
        return view('guru/data_anak.edit',compact('data'));
    }

    public function update(Request $request, $akNoUrt){
        $messages = [
            'required' => ':attribute harus diisi',
            'numeric' => ':attribute harus angka',
            'max' => [
                'file' => ':attribute tidak boleh lebih dari :max kilobytes.',
            ],
        ];
        $attributes = [
            'akNama'   =>  'Golongan',
            'akStatus'   =>  'Tamatan Golongan',
            'akJenkel'   =>  'Nomor SK',
            'akTpLhr'   =>  'Tanggal SK',
            'akTglLhr'   =>  'Masa Kerja Gol Tahun',
            'akStatusPend'   =>  'Masa Kerja Gol Bulan',
            'akPendAkhir'   =>  'Gaji Pokok ',
            'akAlsanTdkSekolah'   =>  'Alasan Tidak Sekolah ',
            'akKerjaan'   =>  'Pekerjaan',
            'akNip'   =>  'NIP',
            'akNoBpjs'   =>  'PJS No',
            'akIbu'   =>  'Nama Ibu',
        ];
        $this->validate($request, [
            // 'akNama'    =>  'required',
            // 'akStatus'    =>  'required',
            // 'akJenkel'    =>  'required',
            // 'akTpLhr'    =>  'required',
            // 'akTglLhr'    =>  'required',
            // 'akStatusPend'    =>  'required',
            // 'akPendAkhir'    =>  'required',
            // 'akAlsanTdkSekolah'    =>  'required',
            // 'akKerjaan'    =>  'required',
            // 'akNip'    =>  'required|numeric',
            // 'akNoBpjs'    =>  'required|numeric',
            // 'akIbu'    =>  'required',
        ],$messages,$attributes);


            Anak::where('akNoUrt',$akNoUrt)->update([
            'akNip'       =>  Auth::user()->pegNip,
                
                'akNama'    =>  $request->akNama,
                'akStatus'    =>  $request->akStatus,
                'akJenkel'    =>  $request->akJenkel,
                'akTpLhr'    =>  $request->akTpLhr,
                'akTglLhr'    =>  $request->akTglLhr,
                'akStatusPend'    =>  $request->akStatusPend,
                'akPendAkhir'    =>  $request->akPendAkhir,
                'akAlsanTdkSekolah'    =>  $request->akAlsanTdkSekolah,
                'akKerjaan'    =>  $request->akKerjaan,
                // 'akNip'    =>  $request->akNip,
                'akNoBpjs'    =>  $request->akNoBpjs,
                'akIbu'    =>  $request->akIbu,
            ]);

            $notification = array(
                'message' => 'Berhasil, data kepangkatan berhasil ditambahkan!',
                'alert-type' => 'success'
            );
            return redirect()->route('guru.data_anak')->with($notification);

    }

    public function delete($akNoUrt){
        Anak::where('akNoUrt',$akNoUrt)->delete();
        $notification = array(
            'message' => 'Berhasil, data data anak berhasil dihapus!',
            'alert-type' => 'success'
        );
        return redirect()->route('guru.data_anak')->with($notification);
    }
}
