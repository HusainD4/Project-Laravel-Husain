<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;


Route::get('/Detail_Produk', function(){
    return "Selamat datang di halaman detail produk";
});

Route::get('/Profile', function(){  
    return "ini adalah halaman profile pengguna";
});

Route::get('/Produk', function(){
    return "ini adalah tampilan produk";
});

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';
