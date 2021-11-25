<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    protected $table = 'tbpendidikan';
    public $timestamps = false;
    use HasFactory;
    protected $fillable = [
        'pendNip',
        'pendNo',
        'pendNmSekol',
        'pendNoIjazah',
        'pendTglIjazah',
        'pendThnLls',
        'pendTempat',
        'pendJurusan',
        'pendDokumen',
        'pendKet',
        'pendKomen',
        'pendTglUnggah',
    ];
}
