<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keluarga extends Model
{
    protected $table = 'tbkeluarga';
    use HasFactory;
    protected $fillable = [
        'kelNip',
        'kelNoUrt',
        'kelIstrike',
        'kelKerjaan',
        'kelNipIstri',
        'kelNama',
        'kelTpLhr',
        'kelTglLhr',
        'kelTglNikah',
        'kelTglNinggal',
        'kelTglCerai',
        'kelBpjs',
        'kelKet',
        'kelTglUnggah',

    ];
}
