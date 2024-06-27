<?php


use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminDokterController;
use App\Http\Controllers\Dokter\DokterController;
use App\Http\Controllers\Obat\ObatController;
use App\Http\Controllers\Pasien\PasienController;
use App\Http\Controllers\Perjanjian\PerjanjianController;
use App\Http\Controllers\JadwalDoktersController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::get('/', function () {
    return view('frontend.index');
});

Route::get('/jadwaldokter', [JadwalDoktersController::class, 'index'])->name('frontend.jadwal.index');

Route::get('/layanan', function() {
    return view('frontend.layanan');
});

Route::get('/tentang', function() {
    return view('frontend.tentang');
});

Route::get('/kontak', function() {
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

// Jadwal Dokter Routes
Route::middleware(['auth', 'checkRole:admin'])->group(function () {
    Route::resource('admin-jadwal', JadwalDoktersController::class);

    Route::get('/admin-jadwal', [JadwalDoktersController::class, 'index'])->name('admin.jadwal.index');
    Route::get('/admin-jadwal/create', [JadwalDoktersController::class, 'create'])->name('admin.jadwal.create');
    Route::post('/admin-jadwal', [JadwalDoktersController::class, 'store'])->name('admin.jadwal.store');
    Route::get('/admin-jadwal/{id}/edit', [JadwalDoktersController::class, 'edit'])->name('admin.jadwal.edit');
    Route::put('/admin-jadwal/{id}', [JadwalDoktersController::class, 'update'])->name('admin.jadwal.update');
    Route::delete('/admin-jadwal/{id}', [JadwalDoktersController::class, 'destroy'])->name('admin.jadwal.destroy');
});

Route::middleware(['auth', 'checkRole:admin,apoteker'])->group(function () {
    Route::resource('admin-dokter', AdminDokterController::class);
    Route::get('/admin-dokter', [AdminDokterController::class, 'index'])->name('admin-dokter.index');
    Route::post('/admin-dokter/store', [AdminDokterController::class, 'store'])->name('admin-dokter.store');
});

Route::middleware(['auth', 'checkRole:admin,apoteker'])->group(function () {
    Route::get('/obat/create', [ObatController::class, 'create'])->name('obat.create');
});

Route::middleware(['auth', 'checkRole:admin,dokter'])->group(function () {
    Route::post('/dokter', [DokterController::class, 'store'])->name('admin.dokter.store');
});

Route::middleware(['auth', 'checkRole:admin,pasien,apoteker'])->group(function () {
    Route::post('/perjanjian', [PerjanjianController::class, 'store'])->name('perjanjian.store');
});

Route::middleware(['auth', 'checkRole:admin,apoteker,dokter'])->group(function () {
    Route::get('/generate-pdf/{pasien}', [PasienController::class, 'generatePDF'])->name('generatePDF');
});

Route::middleware(['auth', 'checkRole:admin'])->group(function () {
    Route::get('/pasien/semua', [PasienController::class, 'showAll'])->name('pasien.all');
});
