<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Keluarga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class DataIstriAtauSuamiController extends Controller
{
    public function index(){
        $keluargas = Keluarga::where('kelNip',Auth::user()->pegNip)->get();
        return view('guru/data_istri_atau_suami.index',compact('keluargas'));
    }

    public function add(){
        return view('guru/data_istri_atau_suami.add');
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
            'kelNama'   =>  'Nama Istri/Suami',
            'kelKerjaan'   =>  'Pekerjaan',
            'kellstrike'   =>  'kellstrike',
            'kelNip'   =>  'NIP',
            'kelTpLhr'   =>  'Tempat Lahir',
            'kelTglLhr'   =>  'Tanggal Lahir',
            'kelTglNikah'   =>  'Tanggal Nikah',
            'kelTglCerai'   =>  'Tanggal Cerai ',
            'kelTglNinggal'   =>  'Tanggal Meninggal ',
            'kelBpjs'   =>  'BPJS No ',
        ];
        $this->validate($request, [
            'kelNama'    =>  'required',
            'kelKerjaan'    =>  'required',
            'kelNip'    =>  'required',
            'kelTpLhr'    =>  'required',
            'kelTglLhr'    =>  'required',
            'kelTglNikah'    =>  'required',
            'kelBpjs'    =>  'required',
        ],$messages,$attributes);

      
      
        Keluarga::create([
            'kelNip'       =>  Auth::user()->pegNip,
            'kelNama'    =>  $request->kelNama,
            'kellstrike'    =>  $request->kellstrike,
            'kelKerjaan'    =>  $request->kelKerjaan,
            'kelNipIstri'    =>  $request->kelNip,
            'kelTpLhr'    =>  $request->kelTpLhr,
            'kelTglLhr'    =>  $request->kelTglLhr,
            'kelTglNikah'    =>  $request->kelTglNikah,
            'kelTglCerai'    =>  $request->kelTglCerai,
            'kelTglNinggal'    =>  $request->kelTglNinggal,
            'kelBpjs'    =>  $request->kelBpjs,
            // 'goDokumen'    =>  $model['goDokumen'],
            'goTglUnggah' =>  date("Y-m-d H:i:s"),
        ]);

        $notification = array(
            'message' => 'Berhasil, data pendidikan berhasil ditambahkan!',
            'alert-type' => 'success'
        );
        return redirect()->route('guru.istri_atau_suami')->with($notification);
    }
    public function edit($kelNoUrt){
        $data = Keluarga::where('kelNoUrt',$kelNoUrt)->first();
    
       
     
      

        return view('guru/data_istri_atau_suami.edit',compact('data'));
    }

    public function update(Request $request, $kelNoUrt){
        $messages = [
            'required' => ':attribute harus diisi',
            'numeric' => ':attribute harus angka',
            'mimes' => 'The :attribute harus berupa file: :values.',
            'max' => [
                'file' => ':attribute tidak boleh lebih dari :max kilobytes.',
            ],
        ];
        $attributes = [
            'kelNama'   =>  'Nama Istri/Suami',
            'kelKerjaan'   =>  'Pekerjaan',
            'kellstrike'   =>  'kellstrike',
            'kelNip'   =>  'NIP',
            'kelTpLhr'   =>  'Tempat Lahir',
            'kelTglLhr'   =>  'Tanggal Lahir',
            'kelTglNikah'   =>  'Tanggal Nikah',
            'kelTglCerai'   =>  'Tanggal Cerai ',
            'kelTglNinggal'   =>  'Tanggal Meninggal ',
            'kelBpjs'   =>  'BPJS No ',
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

       
            Keluarga::where('kelNoUrt',$kelNoUrt)->update([
                'kelNip'       =>  Auth::user()->pegNip,
            'kelNama'    =>  $request->kelNama,
            'kelIstrike'    =>  $request->kelIstrike,
            'kelKerjaan'    =>  $request->kelKerjaan,
            'kelNipIstri'    =>  $request->kelNip,
            'kelTpLhr'    =>  $request->kelTpLhr,
            'kelTglLhr'    =>  $request->kelTglLhr,
            'kelTglNikah'    =>  $request->kelTglNikah,
            'kelTglCerai'    =>  $request->kelTglCerai,
            'kelTglNinggal'    =>  $request->kelTglNinggal,
            'kelBpjs'    =>  $request->kelBpjs,
            // 'goDokumen'    =>  $model['goDokumen'],
            'kelTglUnggah' =>  date("Y-m-d H:i:s"),
            ]);
    
            $notification = array(
                'message' => 'Berhasil, data keluarga berhasil ditambahkan!',
                'alert-type' => 'success'
            );
            return redirect()->route('guru.istri_atau_suami')->with($notification);
        
    }
    

    public function delete($kelNoUrt){
        Keluarga::where('kelNoUrt',$kelNoUrt)->delete();
        $notification = array(
            'message' => 'Berhasil, data pendidikan berhasil dihapus!',
            'alert-type' => 'success'
        );
        return redirect()->route('guru.istri_atau_suami')->with($notification);
    }
}
