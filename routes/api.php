<?php

use App\Http\Controllers\Api\EventController;
use App\Http\Controllers\Api\TicketController;
use App\Http\Controllers\Api\OrderIntentController;
use App\Http\Controllers\Api\OrderController;
use Illuminate\Support\Facades\Route;

Route::prefix('events')->group(function () {
    Route::get('/', [EventController::class, 'index'])->name('events.index');
    Route::get('{id}', [EventController::class, 'show'])->name('events.show');
    Route::get('{id}/ticket-types', [TicketController::class, 'index'])->name('events.ticket-types.index');
});

Route::prefix('order-intents')->group(function () {
    Route::post('/', [OrderIntentController::class, 'store'])->name('order-intents.store');
    Route::post('{id}/confirm', [OrderIntentController::class, 'confirm'])->name('order-intents.confirm');
});

Route::post('orders', [OrderController::class, 'index'])->name('orders.index');
Route::post('orders/confirm', [OrderController::class, 'confirmOrder']);

Route::get('orders/generate-pdf', [OrderController::class, 'generateOrdersPDF']);