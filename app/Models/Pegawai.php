<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table = 'tbpegawai';
    public $timestamps = false;
    use HasFactory;
    protected $fillable = [
        'pendNip',
        'pegGlrDpn',
        'pegGlrBlg',
        'pegNama',
        'pegTpLhr',
        'pegTglLhr',
        'pegJenkel',
        'pegKetkawin',
        'pegKdkawin',
        'pegTmtCpns',
        'pegTmtPns',
        'pegGolTerakhir',
        
        'pegTmtGol',
        'pegMaskerthn',
        'pegMaskerbln',
        'pegPendAkhir',
        'pegThnLulus',
        'pegJurusan',
        'pegTempat',
        'pegAgama',
        'pegStapeg',
        'pegKedHukum',
        'pegIdKedHukum',
        'pegJenisKepeg',
        
        'pegKdJenKepeg',
        'pegNmJabatan',
        'pegKdJab',
        'pegMasapensiun',
        'pegTmtJab',
        'pegKdJenisjab',
        'pegNamaTgsTmbhan',
        'pegIdTgsTmbhan',
        'pegTmtTugasTmbhan',
        'pegNoKarpeg',
        'pegSertifikasi',
        'pegNosertifikasi',
           
        'pegNidn',
        'pegNamaSubUnit',
        'pegKdUnitKerja',
        'pegNpwp',
        'pegAlamat',
        'pegRt_Rw',
        'pegDesa',
        'pegKecamatan',
        'pegKabupaten',
        'pegProvinsi',
        'pegNoHp',
        'pegNik',
        'pegEmail',
        'pegHobi',
        'pegPoto',
        'pegIdpasword',
        'pegTglUbah',
        
    ];
}
