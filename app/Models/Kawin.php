<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kawin extends Model
{
    protected $table = 'refkawin';
    use HasFactory;
    protected $fillable = [
        'KODE',
        'KET',
        'PTKP',
     
        
       
    ];
}
