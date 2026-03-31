<?php

use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CounterController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\TeamController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SubPageController;  



   Route::get('/', function () {
   return view('welcome');
   });


    Route::get('admin/login', [AdminLoginController::class, 'index'])->name('admin.index');
    Route::post('admin/login', [AdminLoginController::class, 'login'])->name('admin.login');



    Route::middleware(['admin', 'auth'])->group(function () {


    Route::get('admin/dashboard', [AdminHomeController::class, 'index'])->name('admin.home');
// Export route for blogs
    Route::get('author/export', [AuthorController::class, 'export'])->name('author.export');
    Route::get('blog/export', [BlogController::class, 'export'])->name('blog.export');
    Route::get('category/export', [CategoryController::class, 'export'])->name('category.export');
    Route::get('contact/export', [ContactController::class, 'export'])->name('contact.export');
    Route::get('counter/export', [CounterController::class, 'export'])->name('counter.export');
    Route::get('reg/export', [ListController::class, 'export'])->name('reg.export');
    Route::get('service/export', [ServiceController::class, 'export'])->name('service.export');
    Route::get('team/export', [TeamController::class, 'export'])->name('team.export');
    Route::get('testimonial/export', [TestimonialController::class, 'export'])->name('testimonial.export');
    Route::get('slider/export', [SliderController::class, 'export'])->name('slider.export');
    Route::get('page/export', [PagesController::class, 'export'])->name('page.export');
    Route::get('subpage/export', [SubPageController::class, 'export'])->name('subpage.export');




// Resource route
    Route::resource('blog', BlogController::class);
    Route::resource('author', AuthorController::class);
    Route::resource('blog', BlogController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('contacts', ContactController::class);
    Route::resource('counter', CounterController::class);
    Route::resource('gall', GalleryController::class);
    Route::resource('service', ServiceController::class);
    Route::resource('sets', SettingController::class);
    Route::resource('team', TeamController::class);
    Route::resource('testimonial', TestimonialController::class);
    Route::resource('reg', ListController::class);
    Route::resource('page',PagesController::class);
    Route::resource('slider',SliderController::class);
    Route::resource('subpage',SubPageController::class);


    Route::view('dashboard', 'admin.dashboard')->name('admin.dashboard');

   //Mail
    Route::get('mail', [MailController::class, 'vMail'])->name('vmail');
    Route::post('send/mail', [MailController::class, 'sendMail'])->name('sendMail');

    });
    
    Auth::routes();

    Route::middleware(['user', 'auth'])->group(function () 
    {
    Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])
        ->name('home');
    });


Route::post('admin_logout', [AdminLoginController::class, 'logout']);

