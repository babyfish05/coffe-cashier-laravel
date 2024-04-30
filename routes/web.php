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
use App\Http\Controllers\absensiController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\contactController;
use App\Http\Controllers\GrafikController;
use App\Http\Controllers\masukController;
use App\Http\Controllers\MejaController;
use App\Http\Controllers\RegisterController;
use App\Models\category;
use App\Models\DataPenjualan;
use App\Models\Jenis;
use App\Models\karyawan;
use App\Models\Menu;
use App\Models\Pelanggan;
use App\Models\Pemesanan;
use Database\Factories\JenisFactory;

Route::get('/', [HomeController::class, 'home']);
// route::group(['middleware'=> 'auth'], function{})
Route::resource('category', CategoryController::class);

//category
Route::resource('category', CategoryController::class);
Route::post('/category', [CategoryController::class, 'store'])->name('category.store');
Route::post('/category-import', [CategoryController::class, 'importData'])->name('import-category');

//karyawan
Route::get('/export/karyawan', [KaryawanController::class, 'export'])->name('export-karyawan');
Route::resource('karyawan', KaryawanController::class);
Route::post('/karyawan', [KaryawanController::class, 'store'])->name('Karyawan.store');
// Route::Post('/import-karyawan', [KaryawanController::class, 'import']);

//jenis
Route::resource('jenis', JenisController::class);
Route::get('/export/jenis', [JenisController::class, 'export'])->name('export-jenis');
Route::post('/jenis-import', [JenisController::class, 'importData'])->name('import-jenis');
Route::get('generate/jenis', [JenisController::class, 'generatepdf'])->name('pdff');

//menu
Route::resource('menu', MenuController::class);
Route::get('/export/menu', [MenuController::class, 'export'])->name('export-menu');
Route::post('/menu-import', [MenuController::class, 'importData'])->name('import-menu');
Route::get('generate/menu', [MenuController::class, 'generatepdf'])->name('menu');


//pelanggan
Route::get('/export/pelanggan', [PelangganController::class, 'export'])->name('export-pelanggan');
Route::Resource('/pelanggan', PelangganController::class);
Route::post('/pelanggan-import', [PelangganController::class, 'importData'])->name('import-pelanggan');
Route::get('generate/pelanggan', [PelangganController::class, 'generatepdf'])->name('pelanggan');

//pemesanan
Route::Resource('/pemesanan', PemesananController::class);

// stok
Route::Resource('/stok', stokController::class);
Route::get('/export/stok', [stokController::class, 'export'])->name('export-stok');
Route::post('/stok-import', [stokController::class, 'importData'])->name('import-stok');
Route::get('generate/stok', [stokController::class, 'generatepdf'])->name('stok');

//transaksi
Route::Resource('/transaksi', TransaksiController::class);
Route::get('nota/{nofaktur}', [TransaksiController::class, 'faktur']);

//login
Route::get('/login', [UserController::class, 'index'])->name('login');
Route::post('/login/cek', [UserController::class, 'cekLogin'])->name('cekLogin');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

//register
Route::Resource('/register', RegisterController ::class);

//route untuk yang sudah login
route::group(['middleware' => 'cekUserLogin:1'], function(){
    route::get('/', [HomeController::class,'home']);
    route::get('profile', [HomeController::class,'about']);
    route::get('contact', [HomeController::class,'contact']);
    Route::resource('produk', produkController::class);
    Route::resource('transaksi', TransaksiController::class);
    
});
//transaksi
Route::resource('transaksi', TransaksiController::class);
//route untuk yang sudah login
// route::group(['middleware' => 'cekUserLogin:2'], function(){
//     route::get('/', [HomeController::class,'home']);
//     route::get('profile', [HomeController::class,'about']);
//     route::get('contact', [HomeController::class,'contact']);
//     Route::resource('produk', produkController::class);
//     Route::resource('transaksi', TransaksiController::class);
    
// });

//meja
Route::Resource('/meja', MejaController::class);
Route::post('/meja-import', [MejaController::class, 'importData'])->name('import-meja');
Route::get('/export/meja', [MejaController::class, 'export'])->name('export-meja');
Route::get('generate/meja', [MejaController::class, 'generatepdf'])->name('Meja');
//produk
Route::Resource('/produk', produkController::class);
Route::get('/export/produk', [produkController::class, 'export'])->name('export-produk');
Route::post('/produk-import', [produkController::class, 'importData'])->name('import-produk');
Route::get('generate/produk', [produkController::class, 'generatepdf'])->name('pdf');

//data penjualan seharusnya relasi sama produk
Route::Resource('/penjualan', PenjualanController::class);

//about
Route::get('/about', [AboutController::class, 'index']);

//absensi
Route::resource('/absensi', absensiController::class);

//masuk
Route::resource('/masuk', masukController::class);
Route::get('/export/masuk', [masukController::class, 'export'])->name('export-masuk');
Route::get('generate/masuk', [masukController::class, 'generatepdf'])->name('masuk');

//contact
Route::get('/contact', [contactController::class, 'index']);


//grafik
Route::get('/grafik', [GrafikController::class, 'index']);
