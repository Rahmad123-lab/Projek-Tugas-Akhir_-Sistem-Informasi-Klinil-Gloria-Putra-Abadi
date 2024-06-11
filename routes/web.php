<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminDokterController;
use App\Http\Controllers\Dokter\DokterController;
use App\Http\Controllers\Obat\ObatController;
use App\Http\Controllers\Pasien\PasienController;
use App\Http\Controllers\Perjanjian\PerjanjianController;
use App\Http\Controllers\JadwalDokterNewController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::group(['middleware' => 'guest'], function () {
    Route::get('/auth/login', function () {
        return view('auth.login');
    });
});

Route::post('/logout', function () {
    $user = Auth::user();
    Auth::logout();

    if ($user->role == 'pasien') {
        return redirect('/'); // Redirect patients to the frontend
    }

    return redirect('/login'); // Redirect others to the login page
})->name('logout');

// Resource Routes with Middleware
Route::resource('dokter', DokterController::class)->middleware('checkRole:dokter,admin,apoteker');
Route::resource('pasien', PasienController::class)->middleware('checkRole:dokter,pasien,admin,apoteker');
Route::resource('admin', AdminController::class)->middleware('checkRole:admin,apoteker');
Route::resource('perjanjian', PerjanjianController::class)->middleware('checkRole:pasien,admin,apoteker');
Route::resource('obat', ObatController::class)->middleware('checkRole:dokter,admin,apoteker');
Route::resource('jadwal-dokter', JadwalDokterController::class);

// Specific Routes
Route::get('/obat/create', [ObatController::class, 'create'])->name('obat.create');
Route::get('/admin-dokter', [AdminDokterController::class, 'index'])->name('admin-dokter.index');
Route::get('/admin-dokter/jadwal', [DokterController::class, 'jadwal'])->name('admin-dokter.jadwal');
Route::resource('admin-dokter', AdminDokterController::class)->middleware('checkRole:admin,apoteker');

// Route::prefix('admin-dokter')->group(function () {
//     Route::get('jadwal', [DokterJadwalController::class, 'index'])->name('admin-dokter.jadwal');
//     Route::post('jadwal', [DokterJadwalController::class, 'store'])->name('jadwal-dokter.store');
//     Route::get('jadwal/{id}/edit', [DokterJadwalController::class, 'edit'])->name('jadwal-dokter.edit');
//     Route::put('jadwal/{id}', [DokterJadwalController::class, 'update'])->name('jadwal-dokter.update');
//     Route::delete('jadwal/{id}', [DokterJadwalController::class, 'destroy'])->name('jadwal-dokter.destroy');
// });
// Additional Store Routes
Route::post('/admin-dokter/store', [AdminDokterController::class, 'store'])->name('admin-dokter.store');
Route::post('/dokter', [DokterController::class, 'store'])->name('admin.dokter.store');
Route::post('/perjanjian', [PerjanjianController::class, 'store'])->name('perjanjian.store');
Route::get('/generate-pdf/{pasien}', [PasienController::class, 'generatePDF'])->name('generatePDF')->middleware('checkRole:dokter,admin,apoteker');
