<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Auth\OtpController;
use App\Http\Controllers\PdfController;
use Illuminate\Support\Facades\Mail;

// Google OAuth
Route::get('/auth/google', [GoogleController::class, 'redirect'])
    ->name('auth.google.redirect');

Route::get('/auth/google/callback', [GoogleController::class, 'callback'])
    ->name('auth.google.callback');

// Test Email (sementara buat debug SMTP)
Route::get('/test-email', function () {
    Mail::raw('Tes OTP Email', function ($m) {
        $m->to('shimaonessis@gmail.com')->subject('Tes SMTP Laravel');
    });
    return 'Cek inbox / spam.';
});

// OTP (pakai Controller, jangan closure)
Route::get('/verify-otp', [OtpController::class, 'showVerifyForm'])
    ->name('verify.otp');

Route::post('/verify-otp', [OtpController::class, 'verify'])
    ->name('verify.otp.submit');

Route::post('/resend-otp', [OtpController::class, 'resend'])
    ->name('verify.otp.resend');

// Default route
Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', function () {
        return view('home');
    })->name('home');

    Route::resource('kategori', KategoriController::class);

    Route::resource('buku', BukuController::class);

    Route::prefix('dokumen')->group(function () {
        // Route untuk Sertifikat (Landscape A4)
        Route::get('/sertifikat', [PdfController::class, 'generateSertifikat'])
            ->name('pdf.sertifikat');

        // Route untuk Undangan/Pengumuman (Portrait A4 + Header)
        Route::get('/undangan', [PdfController::class, 'generateUndangan'])
            ->name('pdf.undangan'); 
    });
});