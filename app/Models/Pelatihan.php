<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelatihan extends Model
{
    protected $table = 'tbpelatihan';
    public $timestamps = false;
    use HasFactory;
    protected $fillable = [
        'pltnip',
        'pltNourt',
        'pltKddiklat',
        'pltNmdiklat',
        'pltKddiklat2',
        'pltNmdiklat2',
        'pltTglmulai',
        'pltTglakhir',
        'pltnosertifikat',
        'pltThnsertifikat',
        'pltTempat',
        'pltDokumen',
        'pltTglUnggah',
        
      
        
    ];
}
