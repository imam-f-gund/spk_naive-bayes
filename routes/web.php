<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Pages\AnalisaController;
use App\Http\Controllers\Pages\KriteriaController;
use App\Http\Controllers\Pages\PerformanceController;
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

Route::get('/', function () {
    if (Auth::check()) {
        return to_route('dashboard');
    } else {
        return to_route('login');
    }
});

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'cek_login'])->name('cek_login');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('dashboard', function () {
    return view('pages.dashboard', ['type_menu' => 'dashboard']);
})->name('dashboard');

Route::resource('kriteria', KriteriaController::class);
Route::get('kriteria', [KriteriaController::class, 'index'])->name('kriteria');
Route::get('analisa', [AnalisaController::class, 'index'])->name('analisa');
Route::post('analisa', [AnalisaController::class, 'prediction'])->name('analisa.prediction');
Route::get('analisa/export', [AnalisaController::class, 'export'])->name('analisa.export');


Route::get('performance', [PerformanceController::class, 'index'])->name('performance');