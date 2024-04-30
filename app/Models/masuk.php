<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class masuk extends Model
{
    use HasFactory;
    protected $table = 'masuk';
    protected $fillable = [ //fillable dan procted properti 
        'nama_karyawan' ,
        'tanggal_masuk',
        'waktu_masuk',
        'status',
        'waktu_selesai_kerja'

    ]; //ini adalah array

    public function masuk()
    {
        return $this->hasMany(masuk::class);
    }
}
