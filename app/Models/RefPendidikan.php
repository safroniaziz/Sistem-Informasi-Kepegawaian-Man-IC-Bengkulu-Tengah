<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefPendidikan extends Model
{
    protected $table = 'refpendidikan';
    public $timestamps = false;
    use HasFactory;
    protected $fillable = [
        'pendKode',
        'pendTingkat',
        'pendNama',
    ];
}
