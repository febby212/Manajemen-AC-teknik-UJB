<?php

use App\Http\Controllers\API\AllReqController;
use App\Http\Controllers\WEB\Ac\DataAcController;
use App\Http\Controllers\WEB\Ac\HistoryServiceController;
use App\Http\Controllers\WEB\Login\LoginController;
use App\Http\Controllers\WEB\Dashboard\HomeController;
use App\Http\Controllers\WEB\Data\MerekAcController;
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

Route::get('/', function() {
    return view('guest.index');
})->name('home');

Route::get('/login', [LoginController::class,'index'])->name('login');
Route::post('auth', [LoginController::class,'login'])->name('check_login');
Route::post('auth/teknisi', [LoginController::class, 'loginTeknisi'])->name('login.teknisi');

Route::prefix('ac')->group(function() {
    //detail riwayat ac (untuk guest atau teknisi)
    Route::get('detail/history/{id}', [HistoryServiceController::class, 'detail']);

    //scan ac
    Route::get('scan', function () {
        return view('guest.scan.index');
    })->name('scan');
});

Route::middleware(['auth','checkUserRole'])->group(function () {
    Route::resource('dashboard', HomeController::class);
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
    Route::resource('teknisi', TeknisiController::class);
    
    //generate token
    Route::get('tokenize', [TokenizeController::class, 'generateToken'])->name('generateToken');
    Route::resource('token', TokenizeController::class);
    Route::get('teknisi/data', [TokenizeController::class, 'dataTeknisi'])->name('teknisiData');

    //daftar ac
    Route::resource('daftarAC', DataAcController::class);

    //history perbaikan ac
    Route::resource('history', HistoryServiceController::class);

    //master data
    Route::resource('merekAc', MerekAcController::class);

    //all request data json
    // Route::get('data-teknisi', [TeknisiController::class, 'dataTeknisi'])->name('data.teknisi');
});


Route::middleware('auth')->prefix('detail')->group(function () {
    // Rute untuk tindakan yang hanya dapat diakses oleh teknisi
    Route::get('/create', [DetailRiwayatController::class, 'create'])->name('buat.riwayat');
    Route::post('/store', [DetailRiwayatController::class, 'store']);
    Route::get('/{id}/edit', [DetailRiwayatController::class, 'edit']);
    Route::put('/{id}', [DetailRiwayatController::class, 'update']);
    Route::delete('/{id}', [DetailRiwayatController::class, 'destroy']);
});

Route::get('/user', function () {
    // $data = History::with('pembuatLaporan', 'teknisiPerbaikan', 'acDesc.merekAC')->get();
    $data = AcDesc::with('merekAC', 'history')->get();
    // dd(auth()->user());
    return view('guest.detail.index', compact('data'));
})->name('dashboard.teknisi');

//detail riwayat ac (untuk guest atau teknisi)
Route::get('detail-riwayat/{id}', [DetailRiwayatController::class, 'show'])->name('detail.riwayat');
Route::get('detail-riwayat-all', [DetailRiwayatController::class, 'index'])->name('detail.riwayat.all');

//scan
Route::get('scan', function() {
    return view('guest.scan.index'); 
})->name('scan');