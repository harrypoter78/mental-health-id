<?php

use App\Http\Controllers\DiagnosisController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Public Routes - Diagnosis
Route::get('/', [DiagnosisController::class, 'index'])->name('diagnosis.index');
Route::get('/diagnosis/kuis', [DiagnosisController::class, 'kuis'])->name('diagnosis.kuis');
Route::post('/diagnosis/proses', [DiagnosisController::class, 'prosesDiagnosis'])->name('diagnosis.proses');
Route::get('/diagnosis/riwayat', [DiagnosisController::class, 'riwayat'])->name('diagnosis.riwayat');

// Admin Routes - Protected by auth
Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    
    // Gejala Routes
    Route::get('/gejala', [AdminController::class, 'indexGejala'])->name('admin.gejala.index');
    Route::get('/gejala/create', [AdminController::class, 'createGejala'])->name('admin.gejala.create');
    Route::post('/gejala', [AdminController::class, 'storeGejala'])->name('admin.gejala.store');
    Route::get('/gejala/{id}/edit', [AdminController::class, 'editGejala'])->name('admin.gejala.edit');
    Route::put('/gejala/{id}', [AdminController::class, 'updateGejala'])->name('admin.gejala.update');
    Route::delete('/gejala/{id}', [AdminController::class, 'destroyGejala'])->name('admin.gejala.destroy');

    // Penyakit Routes
    Route::get('/penyakit', [AdminController::class, 'indexPenyakit'])->name('admin.penyakit.index');
    Route::get('/penyakit/create', [AdminController::class, 'createPenyakit'])->name('admin.penyakit.create');
    Route::post('/penyakit', [AdminController::class, 'storePenyakit'])->name('admin.penyakit.store');
    Route::get('/penyakit/{id}/edit', [AdminController::class, 'editPenyakit'])->name('admin.penyakit.edit');
    Route::put('/penyakit/{id}', [AdminController::class, 'updatePenyakit'])->name('admin.penyakit.update');
    Route::delete('/penyakit/{id}', [AdminController::class, 'destroyPenyakit'])->name('admin.penyakit.destroy');

    // Rule Routes
    Route::get('/rule', [AdminController::class, 'indexRule'])->name('admin.rule.index');
    Route::get('/rule/create', [AdminController::class, 'createRule'])->name('admin.rule.create');
    Route::post('/rule', [AdminController::class, 'storeRule'])->name('admin.rule.store');
    Route::get('/rule/{id}/edit', [AdminController::class, 'editRule'])->name('admin.rule.edit');
    Route::put('/rule/{id}', [AdminController::class, 'updateRule'])->name('admin.rule.update');
    Route::delete('/rule/{id}', [AdminController::class, 'destroyRule'])->name('admin.rule.destroy');

    // Riwayat Routes
    Route::get('/riwayat', [AdminController::class, 'indexRiwayat'])->name('admin.riwayat.index');
    Route::delete('/riwayat/{id}', [AdminController::class, 'destroyRiwayat'])->name('admin.riwayat.destroy');
});

// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', function () {
        return view('auth_login');
    })->name('login');
    
    Route::post('/login', function (Illuminate\Http\Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/admin/dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password tidak sesuai.',
        ]);
    });
});

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout')->middleware('auth');

