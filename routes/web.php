<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\produkController;
use App\Http\Controllers\stokController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AboutController;

use App\Models\category;
use App\Models\DataPenjualan;
use App\Models\Jenis;
use App\Models\karyawan;
use App\Models\Menu;
use App\Models\Pelanggan;
use App\Models\Pemesanan;
use Database\Factories\JenisFactory;

Route::get('/', [HomeController::class, 'home']);

//karyawan
Route::get('/export/karyawan', [KaryawanController::class, 'export'])->name('export-karyawan');
Route::resource('karyawan', KaryawanController::class);
Route::post('/karyawan', [KaryawanController::class, 'store'])->name('Karyawan.store');
// Route::Post('/import-karyawan', [KaryawanController::class, 'import']);

//jenis
Route::resource('jenis', JenisController::class);
Route::get('/export/jenis', [JenisController::class, 'export'])->name('export-jenis');
Route::post('/jenis-import', [JenisController::class, 'importData'])->name('import-jenis');
// Route::get('generate/jenis', [JenisController::class, 'generatepdf'])->name('jenis');

//menu
Route::resource('menu', MenuController::class);
Route::get('/export/menu', [MenuController::class, 'export'])->name('export-menu');
Route::post('/menu-import', [MenuController::class, 'importData'])->name('import-menu');
Route::get('generate/menu', [MenuController::class, 'generatepdf'])->name('menu');


//pelanggan
Route::get('/export/pelanggan', [PelangganController::class, 'export'])->name('export-pelanggan');
Route::Resource('/pelanggan', PelangganController::class);
Route::post('/pelanggan-import', [PelangganController::class, 'importData'])->name('import-pelanggan');

//pemesanan
Route::Resource('/pemesanan', PemesananController::class);

// stok
Route::Resource('/stok', stokController::class);
Route::get('/export/stok', [stokController::class, 'export'])->name('export-stok');
Route::post('/stok-import', [stokController::class, 'importData'])->name('import-stok');

//transaksi
Route::Resource('/transaksi', TransaksiController::class);
Route::get('nota/{nofaktur}', [TransaksiController::class, 'faktur']);

//login
Route::get('/login', [UserController::class, 'index'])->name('login');

//produk
Route::Resource('/produk', produkController::class);
Route::get('/export/produk', [produkController::class, 'export'])->name('export-produk');
Route::post('/produk-import', [produkController::class, 'importData'])->name('import-produk');
Route::get('generate/produk', [produkController::class, 'generatepdf'])->name('pdf');

//data penjualan seharusnya relasi sama produk
Route::Resource('/penjualan', PenjualanController::class);

//about
Route::get('/about', [AboutController::class, 'index']);
