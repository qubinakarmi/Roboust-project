<?php

use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\ListController;
use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\CounterController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\MailController;
use App\Http\Controllers\Admin\PagesController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\SubPageController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Admin\AdmissionController;
use App\Http\Controllers\Admin\AluminiController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CareerController;
use App\Http\Controllers\admin\CertificateController;
use App\Http\Controllers\Admin\EnrollController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Admin\RequirementController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\OfficeController;
use App\Http\Controllers\Admin\PlacementController;
use App\Http\Controllers\admin\ProgramController;
use App\Http\Controllers\Admin\RateController;
use App\Http\Controllers\Admin\WhyUsController;
use Illuminate\Support\Facades\Route;


Route::get('admin/login', [AdminLoginController::class, 'index'])->name('admin.index');
Route::post('admin/login', [AdminLoginController::class, 'login'])->name('admin.login');



// Route::middleware(['admin', 'auth'])->group(function () {


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
Route::get('blog_view', [BlogController::class, 'view'])->name('blog.view');
Route::get('service_view', [ServiceController::class, 'view'])->name('services.view');
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
Route::resource('page', PagesController::class);
Route::resource('slider', SliderController::class);
Route::resource('subpage', SubPageController::class);
Route::resource('course', CourseController::class);
Route::resource('video',VideoController::class);
Route::resource('teacher',TeacherController::class);
Route::resource('admit',AdmissionController::class);
Route::resource('section',SectionController::class);
Route::resource('requirement',RequirementController::class);
Route::resource('faq',FaqController::class);
Route::resource('rate',RateController::class);
Route::resource('alum',AluminiController::class);
Route::resource('place',PlacementController::class);
Route::resource('program',ProgramController::class);
Route::resource('certificate',CertificateController::class);
Route::resource('brand',BrandController::class);
Route::resource('about',AboutUsController::class);
Route::resource('whyUs',WhyUsController::class);
Route::resource('carier',CareerController::class);
Route::resource('enrollment',EnrollController::class);
Route::resource('offices', OfficeController::class);













Route::view('dashboard', 'admin.dashboard')->name('admin.dashboard');

//Mail
Route::get('mail', [MailController::class, 'vMail'])->name('vmail');
Route::post('send/mail', [MailController::class, 'sendMail'])->name('sendMail');

// });


Route::post('admin_logout', [AdminLoginController::class, 'logout']);

