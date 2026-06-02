<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;

Route::get('/login', [TicketController::class, 'login'])->name('Ticketing.login');
Route::post('/login', [TicketController::class, 'login']);
Route::post('/logout', [TicketController::class, 'logout'])->name('logout');
Route::get('/register', [TicketController::class, 'showRegister'])->name('Ticketing.register');
Route::post('/register', [TicketController::class, 'register']);

Route::middleware(['auth'])->group(function () {
    Route::get('/Ticketing', [TicketController::class, 'index'])->name('Ticketing.index');
    Route::get('/Ticketing/nuevo', [TicketController::class, 'create']);
    Route::post('/Ticketing', [TicketController::class, 'store']);
    Route::get('/Ticketing/{id}', [TicketController::class, 'show']);
    Route::post('/Ticketing/{id}/comment', [TicketController::class, 'storeComment'])->name('Ticketing.storeComment');
    Route::get('/Ticketing/{id}/edit', [TicketController::class, 'edit']);
    Route::put('/Ticketing/{id}', [TicketController::class, 'update'])->name('Ticketing.update');
    Route::patch('/Ticketing/{id}/close', [TicketController::class, 'close'])->name('Ticketing.close');
});