<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\produkController;
use App\Http\Controllers\kategoriController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/produk',[produkController::class,'index']);
// Route::get('/kategori',[kategoriController::class,'index']);
Route::get('produk',[produkController::class,"index"])->name('produk');
// Route::post('produk/store',[produkController::class,"store"])->name('produk.store');
Route::delete('produk/destroy',[produkController::class,"destroy"])->name('produk.destroy');
Route::resource('produk',produkController::class);
Route::resource('kategori',kategoriController::class);
Route::post('/produk/update', [ProdukController::class, 'update'])->name('produk.update');
