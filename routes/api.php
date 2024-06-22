<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\SettingBungaController;
use App\Http\Controllers\JenisTransaksiController;
use App\Http\Controllers\TabunganAnggotaController;
use App\Http\Middleware\ApiAuthMiddleware;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/login', [UserController::class, 'login']);
Route::post('/register', [UserController::class, 'register']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [UserController::class, 'logout']);
    Route::get('/user', [UserController::class, 'get']);
    Route::put('/user/update', [UserController::class, 'update']);
    Route::get('/anggota', [AnggotaController::class, 'index']);
    Route::post('/anggota', [AnggotaController::class, 'create']);
    Route::put('/anggota/{id}', [AnggotaController::class, 'update']);
    Route::delete('/anggota/{id}', [AnggotaController::class, 'destroy']);
    // Route::resource('anggota', AnggotaController::class);
    // Route::resource('jenis-transaksi', JenisTransaksiController::class);
    // Route::resource('tabungan', TabunganAnggotaController::class);
    // Route::get('/saldo/(:id)', [TabunganAnggotaController::class, 'saldo/$1']);
    // Route::get('/setting-bunga', [SettingBungaController::class, 'index']);
    // Route::get('add-setting-bunga', [SettingBungaController::class, 'addSettingBunga']);
});

