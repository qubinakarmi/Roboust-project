<?php

use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\ImageController;

// use App\Http\Middleware\UserMiddleware;
// use App\Http\Middleware\AdminMiddleware;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Metadata\Test;

Route::get('/', function () {
    return view('welcome');
});


Route::get('admin/login',[AdminLoginController::class,'index'])->name('admin.index');
Route::post('admin/login',[AdminLoginController::class,'login'])->name('admin.login');

Route::middleware(['admin','auth'])->group(function(){
Route::get('admin/dashboard', [AdminHomeController::class, 'index'])->name('admin.home');


//Resource Controller
Route::resource('blogs', BlogController::class);
Route::resource('testimonial', TestimonialController::class);
Route::resource('services', ServiceController::class);


// Route for view
Route::view('dashboard','admin.dashboard')->name('admin.dashboard');
Route::view('admin/blog','admin.blog.index')->name('admin.blog');
Route::view('admin/testimonial','admin.testimonial.index')->name('admin.testimonial');
Route::view('admin/service','admin.services.index')->name('admin.services');
Route::view('admin/setting','admin.settings.view_settings')->name('admin.setting');

// routes for edit 
Route::view('admin/blog/edit','admin.blog.edit')->name('blogs');
Route::view('admin/services/edit','admin.services.edit')->name('services');
Route::view('admin/settings/edit','admin.settings.edit')->name('settings');
Route::view('admin/testimonial/edit','admin.testimonial.edit')->name('testimonial');
;
});


Auth::routes();


Route::middleware(['user','auth'])->group(function(){
Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])
->name('home');});


Route::post('admin_logout',[AdminLoginController::class,'logout']);
Route::resource('setting', SettingController::class);

Route::view('api','api');

Route::view('counter','admin.counter.counter')->name('admin.counter');


Route::get('contact/form',[FormController::class,'contact_form'])->name('contact.form');
Route::get('register/form',[FormController::class,'register_form'])->name('register.form');

Route::view('practice','practice');
Route::view('gallery','admin.Gallery.gallery')->name('gallery');
Route::view('teams','admin.forms.teams')->name('teams');

Route::view('image','texteditor');




Route::get('/upload', [ImageController::class, 'index'])->name('image.index');
Route::post('/upload', [ImageController::class, 'store'])->name('image.store');