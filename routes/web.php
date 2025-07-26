<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MessageController;

/* Web Routes */

Route::get('/', function () {
    return Auth::check()
        ? redirect()->route('messages.index')
        : redirect()->route('register');
})->name('home');

Route::get('/home', fn () => redirect()->route('messages.index'));

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');
    Route::get('/messages/create', [MessageController::class, 'create'])->name('messages.create');
    Route::post('/messages', [MessageController::class, 'store'])->name('messages.store');
    Route::get('/messages/{message}', [MessageController::class, 'show'])->name('messages.show');
    /* Route delete sudah tersedia */
    Route::delete('/messages/{message}', [MessageController::class, 'destroy'])->name('messages.destroy');
});