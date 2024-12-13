<?php

use App\Http\Controllers\GoodsController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::resource('/', GoodsController::class);
Route::resource('goods', GoodsController::class);
