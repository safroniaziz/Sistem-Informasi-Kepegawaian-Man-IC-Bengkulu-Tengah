<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Golongan extends Model
{
    protected $table = 'refgol';
    public $timestamps = false;
    use HasFactory;
    protected $fillable = [
        'KODE1',
        'IDGOL',
        'GOL',
        'PANGKAT',
        
       
    ];
}
