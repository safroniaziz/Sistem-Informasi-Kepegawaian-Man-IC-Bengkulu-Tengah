<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatJabatan extends Model
{
    protected $table = 'tbriwayatjabfung';
    public $timestamps = false;
    use HasFactory;
    protected $fillable = [
        'jfNip',
        'jfNoUrt',
        'jfKdunit',
        'jfNmunit',
        'jfKdJenisjab',
        'jfKdjab',
        'jfNamajab',
        'jfTmtJab',
        'jfTglSk',
        'jfNoSk',
        'jfDokumen',
        'jfGolongan',
        'jfjafung',
        'jfNmMapel',
        'jfIdMapel',
        'jfKomen',
        'jfTglUnggah',

        'jfKdJenisjab',
        'jfKdjab',
        'jfKdjab',
        'jfTmtjab',
        'jfNoSk',
        'jfTglSk',
        'jfPejabat',
        'jfKdunit',
        'jfDokumen',
        'jfTglUnggah',
    ];
}
