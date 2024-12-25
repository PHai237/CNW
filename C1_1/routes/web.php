<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users1Controller;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [Users1Controller::class, 'index'])->name('users1.index');

Route::get('/users1/create', [Users1Controller::class, 'create'])->name('users1.create');

Route::post('/users1', [Users1Controller::class, 'store'])->name('users1.store');

Route::get('/users1/{id}/edit', [Users1Controller::class, 'edit'])->name('users1.edit');

Route::put('/users1/{id}', [Users1Controller::class, 'update'])->name('users1.update');

Route::delete('/users1/{id}', [Users1Controller::class, 'destroy'])->name('users1.destroy');
