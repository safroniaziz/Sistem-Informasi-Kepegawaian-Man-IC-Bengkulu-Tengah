<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eselon extends Model
{
    protected $table = 'refeselon';
    public $timestamps = false;
    use HasFactory;
    protected $fillable = [
        'KODE1',
        'KODE2',
        'JABATAN',
        'JLH',
        'PENSIUN',
        'GRID',
       
    ];
}
