# kajalpandya/generate_laravel_crud
Just type your entity name and generate model, views, controller

# Add package
add <strong>"kajalpandya/generate_laravel_crud": "dev-master"</strong> in your <strong>composer.json</strong> file
then run 
<strong>$ composer update</strong>

# Add provider
then add provider to your <strong>config/app.php</strong> file

<strong>Youcandothis\Crud\CrudServiceProvider::class</strong>

php artisan vendor:publish --provider="Youcandothis\Crud\CrudServiceProvider"


register your middleware 'admin' => \App\Http\Middleware\AdminOnly::class, in app\Http\Kernel.php in $routeMiddleware group

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
    // change password
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
});
// End Admin Panel