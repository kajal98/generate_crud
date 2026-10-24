<?php

use App\Livewire\Actions\Logout;
use App\Livewire\Admin;
use Illuminate\Support\Facades\Route;

// Admin panel routes, installed by `php artisan crud:install livewire`.
// Loaded from routes/web.php:  require __DIR__.'/crud.php';

Route::livewire('admin/login', Admin\Login::class)->name('admin.login');

Route::middleware('admin')->prefix('admin')->group(function () {
    Route::livewire('/', Admin\Dashboard::class)->name('admin-dashboard');
    Route::post('logout', Logout::class)->name('admin.logout');

    Route::livewire('change-profile', Admin\Profile::class)->name('change-profile');
    Route::livewire('change-password', Admin\ChangePassword::class)->name('get-change-pass');
    Route::livewire('site-settings', Admin\SiteSettings::class)->name('site-settings-get');

    Route::livewire('users', Admin\Users\Index::class)->name('users.index');
    Route::livewire('users/create', Admin\Users\Form::class)->name('users.create');
    Route::livewire('users/{user}', Admin\Users\Show::class)->name('users.show');
    Route::livewire('users/{user}/edit', Admin\Users\Form::class)->name('users.edit');

    Route::livewire('blog_categories', Admin\BlogCategories\Index::class)->name('blog_categories.index');
    Route::livewire('blog_categories/create', Admin\BlogCategories\Form::class)->name('blog_categories.create');
    Route::livewire('blog_categories/{blogCategory}/edit', Admin\BlogCategories\Form::class)->name('blog_categories.edit');

    Route::livewire('blogs', Admin\Blogs\Index::class)->name('blogs.index');
    Route::livewire('blogs/create', Admin\Blogs\Form::class)->name('blogs.create');
    Route::livewire('blogs/{blog}', Admin\Blogs\Show::class)->name('blogs.show');
    Route::livewire('blogs/{blog}/edit', Admin\Blogs\Form::class)->name('blogs.edit');

    Route::livewire('extra', Admin\Extras\Index::class)->name('extra.index');
    Route::livewire('extra/create', Admin\Extras\Form::class)->name('extra.create');
    Route::livewire('extra/{extra}', Admin\Extras\Show::class)->name('extra.show');
    Route::livewire('extra/{extra}/edit', Admin\Extras\Form::class)->name('extra.edit');

    Route::livewire('faq', Admin\Faqs\Index::class)->name('faq.index');
    Route::livewire('faq/create', Admin\Faqs\Form::class)->name('faq.create');
    Route::livewire('faq/{faq}', Admin\Faqs\Show::class)->name('faq.show');
    Route::livewire('faq/{faq}/edit', Admin\Faqs\Form::class)->name('faq.edit');

    Route::livewire('testimonial', Admin\Testimonials\Index::class)->name('testimonial.index');
    Route::livewire('testimonial/create', Admin\Testimonials\Form::class)->name('testimonial.create');
    Route::livewire('testimonial/{testimonial}', Admin\Testimonials\Show::class)->name('testimonial.show');
    Route::livewire('testimonial/{testimonial}/edit', Admin\Testimonials\Form::class)->name('testimonial.edit');

    Route::livewire('feedback', Admin\Feedback\Index::class)->name('feedback.index');
    Route::livewire('feedback/{feedback}', Admin\Feedback\Show::class)->name('feedback.show');

    Route::livewire('inquiry', Admin\Inquiries\Index::class)->name('inquiry.index');
    Route::livewire('inquiry/{inquiry}', Admin\Inquiries\Show::class)->name('inquiry.show');
});
