<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agama extends Model
{
    protected $table = 'refagama';
    use HasFactory;
    protected $fillable = [
        'KODE',
        'NAMA',
       
    ];
}
