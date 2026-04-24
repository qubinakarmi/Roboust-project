<?php

use App\Http\Controllers\frontend\HomeController;
use Illuminate\Support\Facades\Route;
Route::get('home', [HomeController::class, 'detail'])->name('home');
Route::get('contact',[HomeController::class,'contact'])->name('contact');
Route::get('about',[HomeController::class,'about'])->name('about');