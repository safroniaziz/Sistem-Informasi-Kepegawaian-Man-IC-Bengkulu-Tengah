<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenJab extends Model
{
    protected $table = 'tbjenjab';
    public $timestamps = false;
    use HasFactory;
    protected $fillable = [
        'jabKdJenjab',
        'jabKdJab',
        'jabNama',
        'jabEselon',
        'jabPensiun',
        'jabKlsJab',
       
    ];
}
