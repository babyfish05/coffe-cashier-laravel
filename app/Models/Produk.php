<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $table = 'produk';
    protected $fillable = [
        'nama_produk',
        'nama_supplier',
        'harga_beli',
        'harga_jual',
        'stok'

    ];

    public function produk()
    {
        return $this->hasMany(produk::class);
    }
}
