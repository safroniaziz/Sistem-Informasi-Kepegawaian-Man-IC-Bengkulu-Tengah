<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Password extends Model
{
    use HasFactory;
    protected $table = 'tbpasword';
    public $timestamps = false;
    // protected $primaryKey = "id";
    protected $fillable = [
        'pasNama','pasId','pasLogin','password','level_user','email'
    ];
}
