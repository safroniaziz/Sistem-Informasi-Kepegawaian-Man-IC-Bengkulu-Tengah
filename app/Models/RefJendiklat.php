<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefJendiklat extends Model
{
    protected $table = 'refjendiklat';
    public $timestamps = false;
    use HasFactory;
    protected $fillable = [
        'jendikkd',
        'jendiknama',
       
   
    ];
}
