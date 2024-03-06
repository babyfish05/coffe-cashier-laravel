<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesan extends Model
{
    use HasFactory;
    protected $table = 'pemesan';
    //protected $id = 'kategori_makanan_id';
    protected $fillable = ['meja_id', 'tanggal_pemesanan', 'jam_mulai', 'jam_selesai', 'nama_pemesan', 'jumlah_pelanggan'];
}
