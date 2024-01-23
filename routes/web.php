<?php

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

Route::get('dashboard', [App\Http\Controllers\dbViewController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('dashboard/{person}/edit', [App\Http\Controllers\dbViewController::class, 'edit'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard.edit');

Route::put('dashboard/{person}/update', [App\Http\Controllers\dbViewController::class, 'update'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard.update');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('webcam', [App\Http\Controllers\camController::class, 'index']);
Route::post('webcam', [App\Http\Controllers\camController::class, 'store'])->name('webcam.capture');


require __DIR__.'/auth.php';
