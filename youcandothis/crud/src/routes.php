<?php

Auth::routes();
Route::get('user/activation/{token}', 'Auth\RegisterController@userActivation');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::group(['middleware' => ['web']], function () {
    Route::get("/", 'HomeController@index')->name('home');
});


// Start Admin Panel
Route::get('admin/login','Admin\SessionsController@getLogin')->name('admin.login');
Route::post('admin/login', 'Admin\SessionsController@postLogin');

Route::group(['middleware'=>['admin'],'prefix'=>'admin','namespace'=>'Admin',], function(){ 
    // dashborad 
    Route::get('/', 'DashboardController@index')->name('admin-dashboard');
    // logout
    Route::get('logout','SessionsController@getLogout')->name('admin.logout');
    // change - profile
    Route::get('change-profile', 'SessionsController@getProfile')->name('change-profile');
    Route::post('change-profile', 'SessionsController@postProfile')->name('admin.change_profile');
    // change - password
    Route::get('change-password', 'SessionsController@getChangePassword')->name('get-change-pass');
    Route::post('change-password', 'SessionsController@postChangePassword')->name('change-pass');
    // user save-update-delete
    Route::resource('users','UsersController');
    // set user status( active/deactive )
    Route::get('switchstatus/{id}', 'UsersController@SwitchStatus')->name('users.switch');
    // blog categories
    Route::resource('blog_categories','BlogCategoryController');
    // blogs
    Route::resource('blogs','BlogController');
    Route::get('Blogswitchstatus/{id}', 'BlogController@SwitchStatus')->name('blogs.switch');
    // extras
    Route::resource('extra','ExtrasController');
    // faqs
    Route::resource('faq','FaqsController');
    // feedbacks
    Route::resource('feedback','FeedbacksController');
    // inquirys
    Route::resource('inquiry','InquiriesController');
    // testimonials
    Route::resource('testimonial','TestimonialsController');
    //site settings
    Route::get('site-settings', 'DashboardController@site_settings')->name('site-settings-get');
    Route::post('site-settings', 'DashboardController@post_site_settings')->name('site-settings');
    // set feedback status( active/deactive )
    Route::get('switch-status-of-feedback/{id}', 'DashboardController@SwitchStatus')->name('feedbacks.switch');
});
// End Admin Panel