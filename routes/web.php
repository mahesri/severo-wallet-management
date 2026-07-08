<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TransactionController;

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/{any}', function () { return view('spa'); })->where('any', '.*');

