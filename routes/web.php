<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class , 'index']);

Route::get('/add' , [UserController::class , 'add']);
Route::post('/store' , [UserController::class , 'store'])->name('store');

Route::get('/edit/{id}' , [UserController::class , 'edit']);
Route::post('/update/{id}' , [UserController::class , 'update'])->name('update');

Route::delete('/delete/{id}' , [UserController::class , 'delete'])->name('delete');



