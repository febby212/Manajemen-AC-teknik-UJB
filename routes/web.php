<?php

use App\Http\Controllers\API\AllReqController;
use App\Http\Controllers\WEB\Ac\DataAcController;
use App\Http\Controllers\WEB\Ac\HistoryServiceController;
use App\Http\Controllers\WEB\Login\LoginController;
use App\Http\Controllers\WEB\Dashboard\HomeController;
use App\Http\Controllers\WEB\Data\MerekAcController;
use App\Http\Controllers\WEB\Data\PenyetujuController;
use App\Http\Controllers\WEB\GuestTech\GuestTechController;
use App\Http\Controllers\WEB\PublicHistory\DetailRiwayatController;
use App\Http\Controllers\WEB\Teknisi\TeknisiController;
use App\Http\Controllers\WEB\Teknisi\TokenizeController;
use App\Models\AcDesc;
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

Route::get('/', [GuestTechController::class, 'index'])->name('home');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('auth', [LoginController::class, 'login'])->name('check_login');
Route::post('auth/teknisi', [LoginController::class, 'loginTeknisi'])->name('login.teknisi');

Route::middleware('auth')->group(function () {
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

    Route::prefix('detail')->group(function () {
        // Rute untuk tindakan yang hanya dapat diakses oleh teknisi
        Route::get('/create', [DetailRiwayatController::class, 'create'])->name('buat.riwayat');
        Route::post('/store', [DetailRiwayatController::class, 'store']);
        Route::get('/{id}/edit', [DetailRiwayatController::class, 'edit']);
        Route::put('/{id}', [DetailRiwayatController::class, 'update']);
        Route::delete('/{id}', [DetailRiwayatController::class, 'destroy']);
    });
});
Route::middleware(['auth', 'checkUserRole'])->group(function () {
    Route::resource('dashboard', HomeController::class);
    Route::resource('teknisi', TeknisiController::class);

    //generate token
    Route::get('tokenize', [TokenizeController::class, 'generateToken'])->name('generateToken');
    Route::resource('token', TokenizeController::class);
    Route::get('teknisi/data', [TokenizeController::class, 'dataTeknisi'])->name('teknisiData');
    
    //download qr as pdf
    Route::get('download-qr/{id}', [DataAcController::class, 'downloadQR'])->name('daftarAC.downloadQR');

    Route::get('download-qr-img/{id}', [DataAcController::class, 'downloadQRImg'])->name('daftarAC.downloadQRImg');

    //daftar ac
    Route::resource('daftarAC', DataAcController::class);

    //export riwayat
    Route::get('export=riwayat', [HistoryServiceController::class, 'exportHistory'])->name('export.history');

    //history perbaikan ac
    Route::resource('history', HistoryServiceController::class);

    //master data
    Route::resource('merekAc', MerekAcController::class);
    Route::resource('penyetuju', PenyetujuController::class);

    //all request data json
    // Route::get('data-teknisi', [TeknisiController::class, 'dataTeknisi'])->name('data.teknisi');

});

Route::get('/user', function () {
    // $data = History::with('pembuatLaporan', 'teknisiPerbaikan', 'acDesc.merekAC')->get();
    $data = AcDesc::with('merekAC', 'history')->get();
    // dd(auth()->user());
    return view('guest.detail.index', compact('data'));
})->name('dashboard.teknisi');

//detail data ac
Route::get('data-ac/{ruangan}', [GuestTechController::class, 'dataAcByRoom'])->name('dataAc.guest');

//scan
Route::get('scan', function () {
    $ref = ['title' => 'Scan QR'];
    $appUrl = env('APP_URL');
    return view('guest.scan.index', compact('ref', 'appUrl'));
})->name('scan');

//detail riwayat ac (untuk guest atau teknisi)
Route::get('detail-riwayat/{id}', [DetailRiwayatController::class, 'show'])->name('detail.riwayat');
Route::get('detail-riwayat-all', [DetailRiwayatController::class, 'index'])->name('detail.riwayat.all');


