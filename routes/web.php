<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

require __DIR__.'/admin.php';
require __DIR__.'/frontend.php';


Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/profile', function () {
    return view('profile');
});





