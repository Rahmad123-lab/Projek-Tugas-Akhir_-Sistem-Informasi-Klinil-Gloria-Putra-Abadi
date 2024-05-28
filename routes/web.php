<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminDokterController;
use App\Http\Controllers\Dokter\DokterController;
use App\Http\Controllers\Obat\ObatController;
use App\Http\Controllers\Pasien\PasienController;
use App\Http\Controllers\Perjanjian\PerjanjianController;
use App\Models\Obat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();
Route::get('/', function () {
    return view('frontend.index');
});
Route::get('/jadwaldokter', function() {
    return view('frontend.jadwaldokter');
});
Route::get('/layanan', function() {
    return view('frontend.layanan');
});
Route::get('/tentang', function() {
    return view('frontend.tentang');
});
Route::get('/Kontak', function() {
    return view('frontend.contact');
});

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('checkRole:dokter,admin,pasien,apoteker');
Route::get('/generate-pdf/{pasien}', [PasienController::class, 'generatePDF'])->name('generatePDF')->middleware('checkRole:dokter,admin,apoteker');
Route::get('/auth/login', function () {
  return view('auth.login');
})->middleware('guest');
Route::resource('dokter', DokterController::class)->middleware('checkRole:dokter,admin,apoteker');
Route::resource('pasien', PasienController::class)->middleware('checkRole:dokter,pasien,admin,apoteker');
Route::resource('admin', AdminController::class)->middleware('checkRole:admin,apoteker');
Route::resource('perjanjian', PerjanjianController::class)->middleware('checkRole:pasien,admin,apoteker');
Route::resource('obat', ObatController::class)->middleware('checkRole:dokter,admin,apoteker');
Route::resource('admin-dokter', AdminDokterController::class)->middleware('checkRole:admin,apoteker');
