<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anak extends Model
{
    protected $table = 'tbanak';
    use HasFactory;
    protected $fillable = [
        'akNip',
        'akNoUrt',
        'akIbu',
        'akKerjaan',
        'akNipAnak',
        'akNama',
        'akTpLhr',
        'akTglLhr',
        'akJenkel',
        'akNoBpjs',
        'akStatus',
        'akStatusPend',
        'akPendAkhir',
        'akAlsanTdkSekolah',

    ];
}
