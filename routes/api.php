<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/transactions', [\App\Http\Controllers\Api\TransactionController::class, 'getTransactions'])->name('getTransactions');

Route::post('/transactions',[\App\Http\Controllers\Api\TransactionController::class, 'createTransaction'])->name('createTransaction');

Route::get('/summerize', [\App\Http\Controllers\Api\DashboardController::class, 'getSummerize'])->name('getSummerize');

Route::get('/current',[\App\Http\Controllers\Api\DashboardController::class, 'getCurrentSaldo']);

Route::get('/hello', function () {
return response()->json([
    'message' => 'Hello this is from laravel'
]);
});

