<?php

use App\Http\Controllers\Api\EventController;
use App\Http\Controllers\Api\TicketController;
use App\Http\Controllers\Api\OrderIntentController;
use App\Http\Controllers\Api\OrderController;


Route::get('/events',[EventController::class, 'index' ]);
Route::get('events/{id}', [EventController::class, 'show' ]);
Route::get('events/{id}/ticket-types', [TicketController::class, 'index' ]);
Route::post('order-intents',[OrderIntentController::class, 'store' ]);
Route::post('order-intents/{id}/confirm',[OrderIntentController::class, 'confirm' ]);
Route::get('orders', [OrderController::class, 'index' ]);
