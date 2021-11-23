<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $primaryKey = 'pegNip';
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $table = 'tbpegawai';
    protected $fillable = [
        'pegNip',
        'pegGlrDpn',
        'pegNama',
        'perGlrBlg',
        'pegTptLhr',
        'pegTglLhr',
        'perJenKel',
        'pegKetkawin',
        'pegKdkawin',
        'pegTmtCpns',
        'pegTmtPns',
        'pegGolTerakhir',
        'pegTmtGol',
        'pegMaskerthn',
        'perMaskerbln',
        'pegPendAkhir',
        'pegThnLulus',
        'pegJurusan',
        'pegTempat',
        'pegAgama',
        'pegStapeg',
        'pegKedHukum',
        'pegIdKedHukum',
        'pegJenisKepeg',
        'pegKdJenKepeg',
        'pegNmJabatan',
        'pegKdJab',
        'pegMasapensiun',
        'oegTmtJab',
        'pegKdJenisjab',
        'pegNamaTgsTmbhan',
        'pegIdTgsTmbhan',
        'pegIdTgsTmbhan',
        'pegTntTugasTmbhan',
        'pegNoKarpeg',
        'pegSertifikasi',
        'pegNidn',
        'pegNamaSubUnit',
        'pegKdUnitKerja',
        'pegNpwp',
        'pegAlamat',
        'pegRt_Rw',
        'pegDesa',
        'pegKecamatan',
        'pegKabupaten',
        'pegProvinsi',
        'pegNoHp',
        'pegNik',
        'pegEmail',
        'pegHobi',
        'pegPoto',
        'pegIdpassword',
        'pegTglUbah',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
