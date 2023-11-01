<?php

use App\Livewire\Tweets;
use App\Livewire\UserPage;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('tweets', Tweets::class)
    ->middleware(['auth', 'verified'])
    ->name('tweets');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');
Route::get('u/{user:username}', UserPage::class)
    ->middleware(['auth', 'verified'])
    ->name('userpage');

require __DIR__.'/auth.php';
