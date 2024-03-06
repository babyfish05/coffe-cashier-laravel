<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksi';
    public $incrementing = false;
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'tanggal', 'total_harga', 'metode_pembayaran', 'keterangan'];

    public function detailTransaksi()
    {
        return $this->hasMany(DetailTransaksi::class);
    }
}

// class DetailTransaksi extends Model
// {
//     use HasFactory;
//     protected $table = 'detail_transaksis';
//     protected $fillable = ['transaksi_id', 'menu_id', 'jumlah', 'subtotal'];

//     public function Transaksi()
//     {
//         return $this->belongsTo(Transaksi::class);
//     }
// }
