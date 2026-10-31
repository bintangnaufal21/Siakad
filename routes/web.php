<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])
        ->middleware('throttle:login')
        ->name('login.store');

    Route::get('/register', [AuthController::class, 'showRegistration'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.store');
});

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/', function (Request $request) {
        return redirect()->route($request->user()->role === 'admin' ? 'admin.dashboard' : 'user.dashboard');
    })->name('home');

    Route::middleware('role:user')->prefix('user')->name('user.')->group(function () {
        Route::get('/', function () {
            return view('user.dashboard');
        })->name('dashboard');

        Route::get('/jadwal', function () {
            return view('user.jadwal');
        })->name('jadwal');

        Route::get('/materi', function () {
            return view('user.Materi');
        })->name('materi');

        Route::get('/tugas', function () {
            return view('user.Tugas');
        })->name('tugas');

        Route::get('/kontak', function () {
            return view('user.Kontak');
        })->name('kontak');
    });

    Route::middleware('role:admin')->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        Route::get('/tugas', function () {
            return view('admin.tugas');
        })->name('tugas');

        Route::get('/jadwal', function () {
            return view('admin.jadwal');
        })->name('jadwal');

        Route::get('/materi', function () {
            return view('admin.materi');
        })->name('materi');
    });
});
