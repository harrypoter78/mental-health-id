<?php

use App\Http\Controllers\DiagnosisController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Public Routes - Diagnosis
Route::get('/', [DiagnosisController::class, 'index'])->name('diagnosis.index');
Route::get('/diagnosis/kuis', [DiagnosisController::class, 'kuis'])->name('diagnosis.kuis');
Route::match(['get', 'post'], '/diagnosis/proses', [DiagnosisController::class, 'prosesDiagnosis'])->name('diagnosis.proses');
Route::get('/diagnosis/riwayat', [DiagnosisController::class, 'riwayat'])->name('diagnosis.riwayat');

// Admin Routes - Protected by auth and admin role
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
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
            // Check role dan redirect accordingly
            if (auth()->user()->role === 'admin') {
                return redirect()->intended('/admin/dashboard');
            } else {
                return redirect()->intended('/');
            }
        }

        return back()->withErrors([
            'email' => 'Email atau password tidak sesuai.',
        ]);
    });

    Route::post('/register', function (Illuminate\Http\Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = \App\Models\User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => \Illuminate\Support\Facades\Hash::make($validated['password']),
            'role' => 'user',
        ]);

        Auth::login($user);
        return redirect()->intended('/');
    });
});

Route::post('/logout', function () {
    Auth::logout();
    
    // Clear session dan add cache control headers untuk prevent back button access
    return redirect('/')->withHeaders([
        'Cache-Control' => 'no-cache, no-store, must-revalidate, private',
        'Pragma' => 'no-cache',
        'Expires' => '0',
    ]);
})->name('logout')->middleware('auth');

// User Profile Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', function () {
        return view('user_profile');
    })->name('profile.edit');

    Route::post('/profile/update', function (Illuminate\Http\Request $request) {
        $user = auth()->user();
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        $user->update($validated);
        return redirect()->route('profile.edit')->with('success', 'Profil berhasil diperbarui');
    })->name('profile.update');

    Route::post('/profile/change-password', function (Illuminate\Http\Request $request) {
        $validated = $request->validate([
            'current_password' => 'required|string',
            'new_password' => 'required|string|min:6|confirmed',
        ]);

        $user = auth()->user();

        if (!\Illuminate\Support\Facades\Hash::check($validated['current_password'], $user->password)) {
            return back()->withErrors(['current_password' => 'Password saat ini tidak sesuai']);
        }

        $user->update([
            'password' => \Illuminate\Support\Facades\Hash::make($validated['new_password']),
        ]);

        return back()->with('success', 'Password berhasil diubah');
    })->name('profile.change-password');
});

