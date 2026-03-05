<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Auth\OtpController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\BarangController;

// ================= GOOGLE OAUTH =================
Route::get('/auth/google', [GoogleController::class, 'redirect'])
    ->name('auth.google.redirect');

Route::get('/auth/google/callback', [GoogleController::class, 'callback'])
    ->name('auth.google.callback');

// ================= TEST EMAIL =================
Route::get('/test-email', function () {
    Mail::raw('Tes OTP Email', function ($m) {
        $m->to('shimaonessis@gmail.com')->subject('Tes SMTP Laravel');
    });
    return 'Cek inbox / spam.';
});

// ================= OTP =================
Route::get('/verify-otp', [OtpController::class, 'showVerifyForm'])
    ->name('verify.otp');

Route::post('/verify-otp', [OtpController::class, 'verify'])
    ->name('verify.otp.submit');

Route::post('/resend-otp', [OtpController::class, 'resend'])
    ->name('verify.otp.resend');

// ================= DEFAULT =================
Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

// ================= AUTH AREA =================
Route::middleware(['auth'])->group(function () {

    Route::get('/home', function () {
        return view('home');
    })->name('home');

    Route::resource('kategori', KategoriController::class);
    Route::resource('buku', BukuController::class);

    Route::prefix('dokumen')->group(function () {

        // ===== PDF SERTIFIKAT & UNDANGAN =====
        Route::get('/sertifikat', [PdfController::class, 'generateSertifikat'])
            ->name('dokumen.sertifikat');

        Route::get('/undangan', [PdfController::class, 'generateUndangan'])
            ->name('dokumen.undangan');

        // ===== BARANG (INI YANG FIX TOTAL) =====
        Route::resource('barang', BarangController::class);

        Route::post('/barang/pdf-tag',
            [BarangController::class, 'pdf_tag']
        )->name('barang.pdf_tag');

    });
});