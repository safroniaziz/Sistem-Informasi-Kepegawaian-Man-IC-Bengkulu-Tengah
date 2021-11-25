<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisJab extends Model
{
    protected $table = 'tbjenisjab';
    public $timestamps = false;
    use HasFactory;
    protected $fillable = [
        'jenKdJenJab',
        'jenNmjenJab',
        'jenisPeg',
      
       
    ];
}
