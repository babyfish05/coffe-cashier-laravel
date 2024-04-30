<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaksi;
use App\Models\Menu;
use App\Models\Pelanggan;
use App\Models\Stok;
use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GrafikController extends Controller
{
    //tampilkan untuk jumlah menu
    public function index()
    {
        $Menu = Menu::get();
        $data['count_menu'] = $Menu->count();

        // tampilkan jumlah transaksi
        $jumlahTransaksi = Transaksi::count();
        $data['jumlahTransaksi'] = $jumlahTransaksi;


        //tampilkan data pelanggan terakhir
        $data['detailTransaksi'] = DetailTransaksi::with('menu')->orderBy('created_at', 'desc')
        ->take(3)
        ->get();

        //tampilkan semua pendapatan
        $transaksi = Transaksi::get();
        $data['pendapatan'] = $transaksi->sum('total_harga');
        $data['totalPendapatan'] = "Rp " . number_format($data['pendapatan'], 0, ' , ', '.');

        //tampilam stok terendah

        $data['stok'] = Stok::with('menu')->where('jumlah_stok', '<=', 3)->get();


        $pendapatanPerTanggal = $transaksi->groupBy(function ($date) {
            return Carbon::parse($date->tanggal)->format('m/d');
        })->map->sum('total_harga');

        //top 5
        $menuSales = DetailTransaksi::with('menu')->select('menu_id', DB::raw('SUM(jumlah) as total_sales'))
            ->with('menu')
            ->groupBy('menu_id')
            ->orderBy('total_sales', 'desc')
            ->take(5)
            ->get();

        // Tambahkan data top 5 penjualan menu ke array data
        $data['menuSales'] = $menuSales;

        // dd($data['menuSales']);


        return view('data', compact('data'));
    }
}
