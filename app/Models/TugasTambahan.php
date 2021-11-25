<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TugasTambahan extends Model
{
    protected $table = 'tbtgstambahan';
    public $timestamps = false;
    use HasFactory;
    protected $fillable = [
        'tgsNip',
        'tgsNoUrut',
        'tgsIdJab',
        'tgsNamajab',
        'tgsTmt',
        'tgsNoSk',
        'tgsTglSk',
        'tgsTtdPejabat',
        'tgsDokumen',

    ];
}
