<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meja extends Model
{
    use HasFactory;
    protected $table = 'Meja';
    //protected $id = 'kategori_makanan_id';
    protected $fillable = ['nomor_meja', 'kapasitas', 'status'];
}
