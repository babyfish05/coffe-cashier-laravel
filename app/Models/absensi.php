<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Absensi extends Model
{
    protected $table = "absensi";

    protected $fillable = [
        'namaKaryawan',
        'tanggalMasuk',
        'waktuMasuk',
        'status',
        'waktuKeluar',

    ];
}
