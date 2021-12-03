<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatGolongan extends Model
{
    protected $table = 'tbriwayatgol';
    public $timestamps = false;
    use HasFactory;
    protected $fillable = [
        'goNip',
        'goNoUrt',
        'goCpns',
        'goGol',
        'goNoSk',
        'goTglSk',
        'goMaskerThn',
        'goMaskerBln',
        'goTmtGol',
        'goNoBkn',
        'goTglBkn',
        'goJenisSk',

        'goGapok',
        'goPejabat',
        'goDokumen',
        'goKet',
        'goKomen',
        'goTglUnggah',


    ];
}
