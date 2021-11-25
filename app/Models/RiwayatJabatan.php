<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatJabatan extends Model
{
    protected $table = 'tbriwayatjab';
    public $timestamps = false;
    use HasFactory;
    protected $fillable = [
        'jbNoUrt',
        'jbKdunit',
        'jbNmunit',
        'jbKdJenisjab',
        'jbKdjab',
        'jbNamajab',
        'jbTmtJab',
        'jbTglSk',
        'jbNoSk',
        'jbTglakhir',
        'jbIdTugas',
        'jbTgstambahan',
        
        'jbGol',
        'jbGapok',
        'jbPejabat',
        'jabTunjangan',
        'jbDokumen',
        'jbKlsJab',
        'jbKet',
        'jbKomen',
        'jbTglUnggah',
    ];
}
