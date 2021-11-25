<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KedHukum extends Model
{
    protected $table = 'tbkedhukum';
    use HasFactory;
    protected $fillable = [
        'kedIdHukum',
        'kedNmHukum',
     
      
       
    ];
}
