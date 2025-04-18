<?php

use App\Livewire\Settings;
use Illuminate\Support\Facades\Route;
use App\Livewire\Transactions;


// Main route with placeholder routes for non-existant pages
Route::get('/', Transactions::class)->name('Transactions');
// Placecholders
Route::get('/settings', Settings::class)->name('Settings');
Route::get('/user-settings', Settings::class)->name('User Settings');
Route::get('/atm-settings', Settings::class)->name('ATM Settings');
Route::get('/my-settings', Settings::class)->name('My Settings');
