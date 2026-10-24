<?php

use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ExtrasController;
use App\Http\Controllers\Admin\FaqsController;
use App\Http\Controllers\Admin\FeedbacksController;
use App\Http\Controllers\Admin\InquiriesController;
use App\Http\Controllers\Admin\SessionsController;
use App\Http\Controllers\Admin\TestimonialsController;
use App\Http\Controllers\Admin\UploadController;
use App\Http\Controllers\Admin\UsersController;
use Illuminate\Support\Facades\Route;

// Admin panel routes, installed by `php artisan crud:install blade`.
// Loaded from routes/web.php:  require __DIR__.'/crud.php';

Route::get('admin/login', [SessionsController::class, 'getLogin'])->name('admin.login');
Route::post('admin/login', [SessionsController::class, 'postLogin'])->middleware('throttle:6,1');

Route::middleware('admin')->prefix('admin')->group(function () {
    // dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('admin-dashboard');
    // logout
    Route::post('logout', [SessionsController::class, 'getLogout'])->name('admin.logout');
    // image uploads for blogs and extra pages
    Route::post('upload', [UploadController::class, 'store'])->name('admin.upload');
    // change - profile
    Route::get('change-profile', [SessionsController::class, 'getProfile'])->name('change-profile');
    Route::post('change-profile', [SessionsController::class, 'postProfile'])->name('admin.change_profile');
    // change - password
    Route::get('change-password', [SessionsController::class, 'getChangePassword'])->name('get-change-pass');
    Route::post('change-password', [SessionsController::class, 'postChangePassword'])->name('change-pass');
    // user save-update-delete
    Route::resource('users', UsersController::class);
    // set user status( active/deactive )
    Route::get('switchstatus/{id}', [UsersController::class, 'SwitchStatus'])->name('users.switch');
    // blog categories
    Route::resource('blog_categories', BlogCategoryController::class);
    // blogs
    Route::resource('blogs', BlogController::class);
    Route::get('Blogswitchstatus/{id}', [BlogController::class, 'SwitchStatus'])->name('blogs.switch');
    // extras
    Route::resource('extra', ExtrasController::class);
    // faqs
    Route::resource('faq', FaqsController::class);
    // feedbacks
    Route::resource('feedback', FeedbacksController::class)->only(['index', 'show', 'destroy']);
    // inquiries
    Route::resource('inquiry', InquiriesController::class)->only(['index', 'show', 'destroy']);
    // testimonials
    Route::resource('testimonial', TestimonialsController::class);
    // site settings
    Route::get('site-settings', [DashboardController::class, 'site_settings'])->name('site-settings-get');
    Route::post('site-settings', [DashboardController::class, 'post_site_settings'])->name('site-settings');
    // set feedback status( active/deactive )
    Route::get('switch-status-of-feedback/{id}', [FeedbacksController::class, 'SwitchStatus'])->name('feedbacks.switch');
});
// End Admin Panel
