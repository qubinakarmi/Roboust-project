<?php

use App\Http\Controllers\frontend\ApplyController;
use App\Http\Controllers\frontend\BlogController;
use App\Http\Controllers\frontend\CareerController;
use App\Http\Controllers\frontend\ContactController;
use App\Http\Controllers\frontend\CourseController;
use App\Http\Controllers\frontend\EnrollController;
use App\Http\Controllers\frontend\HomepageController;
use App\Http\Controllers\frontend\TeamController;
use App\Http\Controllers\frontend\FaqController;
use App\Http\Controllers\frontend\AboutController;


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

Route::get('home', [HomepageController::class, 'index'])->name('home');
Route::get('coming-soon', [HomepageController::class, 'comingSoon'])->name('coming-soon');
Route::get('about-us', [HomepageController::class, 'about'])->name('about-us');
Route::get('faqs', [FaqController::class, 'index'])->name('faqs');

Route::get('contact/{slug}', [ContactController::class, 'show'])
    ->name('contact.office');


Route::get('disclaimer', function () {
    return view('frontend.front.disclaimer');
})->name('front-disclaimer');
Route::get('privacy-policy', function () {
    return view('frontend.front.policy');
})->name('front-policy');
Route::get('terms-and-conditions', function () {
    return view('frontend.front.terms');
})->name('front-terms');

// Courses
Route::prefix('courses')->name('courses.')->group(function () {
    Route::get('list', [HomepageController::class, 'course_list'])->name('course-list');


    Route::get('{slug}', [CourseController::class, 'course_detail'])->name('course_detail');

    Route::get('course-detail', [CourseController::class, 'show'])->name('course-detail');
});




// Blogs
Route::prefix('blogs')->name('blogs.')->group(function () {
    Route::get('blog', [BlogController::class, 'index'])->name('index');
    Route::get('{slug}', [BlogController::class, 'blog'])->name('blog');
});

// Careers
Route::prefix('careers')->name('careers.')->group(function () {
    Route::get('careers', [CareerController::class, 'index'])->name('index');
});

// Enroll
Route::prefix('enroll')->name('enroll.')->group(function () {
    Route::get('enroll', [EnrollController::class, 'index'])->name('index');
    // Route::post('enroll', [EnrollController::class, 'store'])->name('store');
});
Route::get('front/teams',[TeamController::class,'index'])->name('teams');