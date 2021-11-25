<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stapeg extends Model
{
    protected $table = 'tbstapeg';
    use HasFactory;
    protected $fillable = [
        'spId',
        'spNama',
        'Keterangan',
   
    ];
}
