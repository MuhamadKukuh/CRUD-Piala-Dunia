<?php

use App\Http\Controllers\PertandinganController;
use App\Http\Controllers\ProfileController;
use App\Models\PapanSkor;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    $data = PapanSkor::all();

    return Inertia::render('Dashboard', ['data' => $data]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/tambah-hasilPertandingan', [PertandinganController::class, 'index'])->name('tambahSkor');
Route::post('/tambahScore', [PertandinganController::class, 'store'])->name('createScore');
Route::post('/updateScore/{id}', [PertandinganController::class, 'update'])->name('updateScore');
Route::get('/destroyAnying/{id}', [PertandinganController::class, 'destroy'])->name('destroyAnying');

require __DIR__.'/auth.php';
