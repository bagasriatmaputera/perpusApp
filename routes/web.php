<?php

use App\Livewire\Actions\Logout;
use App\Livewire\BukuComponent;
use App\Livewire\HomeComponent;
use App\Livewire\DashboardComponent;
use App\Livewire\KategoriComponent;
use App\Livewire\MemberComponent;
use App\Livewire\PinjamComponent;
use App\Livewire\UserComponent;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/',HomeComponent::class)->name('home');

Route::middleware(['auth'])->group(function () {
    // Auto Route Laravel Build In
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
    // Manual Route
    Route::get('/user',UserComponent::class)->name('user');
    Route::get('/member',MemberComponent::class)->name('member');
    Route::get('/buku',BukuComponent::class)->name('buku');
    Route::get('/pinjam',PinjamComponent::class)->name('pinjam');
    Route::get('/kategori',KategoriComponent::class)->name('kategori');
    Route::get('/dasboard',DashboardComponent::class)->name('dashboard');
    Route::post('/logout',Logout::class)->name('logout');
});

require __DIR__.'/auth.php';
