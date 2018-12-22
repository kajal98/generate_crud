# Just type your entity name and generate model, views, controller

## create new directory in your root folder
<strong>$ composer create-project --prefer-dist laravel/laravel blog</strong>

## go to your directory
<strong>$ cd blog</strong>

## move .env.example file to .env
<strong>$ mv .env.example .env</strong>

## generate your app key
<strong>$ php artisan key:generate</strong>

set your database configuration in .env file

run localhost:8000 in your browser

if all working good then put this line to your composer.json file

<strong>"kajalpandya/generate_laravel_crud": "dev-master",</strong>

## update composer 
<strong>$ composer update</strong>

## Register provider and aliases
then put this line to your config/app.php file in providers array
<strong>Youcandothis\Crud\CrudServiceProvider::class,</strong>
<strong>Intervention\Image\ImageServiceProvider::class,</strong>

and this in aliases array
<strong>'Image' => Intervention\Image\Facades\Image::class,</strong>

## Remove below files
<strong>database/migrations</strong>
<strong>database/seeds</strong>

## Clear the cache
<strong>$ php artisan config:cache</strong>

## Auto load files
<strong>$ composer dump-autoload</strong>

## Clear the cache again
<strong>$ php artisan config:cache</strong>

## Finaly publish the provider
<strong>$ php artisan vendor:publish --provider="Youcandothis\Crud\CrudServiceProvider"</strong>

## copy routes from below file
<strong>vendor/kajalpandya/youcandothis/crud/src/web.php</strong>

## Register middleware in app\Http\Kernel.php in $routeMiddleware group
<strong>'admin' => \App\Http\Middleware\AdminOnly::class,</strong>


## autoload helper file in your composer.json file under "autoload" array
"files": [
    "app/helpers.php"
]

##  put this in DatabaseSeeder run function
$this->call(SiteSettingsTableSeeder::class);
$this->call(UsersTableSeeder::class);
$this->call(BlogCategoriesTableSeeder::class);
$this->call(BlogsTableSeeder::class);
$this->call(ExtrasTableSeeder::class);
$this->call(TestimonialsTableSeeder::class);

## then run
<strong>$ php artisan migrate && php artisan db:seed</strong>

## make tmp folder in public

then run localhost:8000

Have fun..!!!!!

# clone direct repository from below url
<strong>https://github.com/kajal98/laravel-ready-admin-panel</strong>

## Screenshots

<strong>Register</strong>
![register](https://user-images.githubusercontent.com/18494848/42377118-85616acc-813f-11e8-813c-80ccb0365a0e.png)<br />
<strong>Login</strong>
![login](https://user-images.githubusercontent.com/18494848/42377119-85ac06d6-813f-11e8-832b-cd11a469157f.png)<br />
<strong>Dashboard</strong>
![1](https://user-images.githubusercontent.com/18494848/42441533-0b282a68-8386-11e8-8a5d-e2abf16bb18b.png)<br />
<strong>User Listing</strong>
![2](https://user-images.githubusercontent.com/18494848/42441532-0af5253c-8386-11e8-838c-7a127bfd08ca.png)<br />
<strong>Change Profile</strong>
![3](https://user-images.githubusercontent.com/18494848/42441537-0c1d8418-8386-11e8-9d12-8cb56d81c684.png)<br />
<strong>Change Password</strong>
![4](https://user-images.githubusercontent.com/18494848/42441539-0c527d3a-8386-11e8-81cd-9d534fb5494f.png)<br />
<strong>Site Settings</strong>
![5](https://user-images.githubusercontent.com/18494848/42441540-0c86b8a2-8386-11e8-9da5-55e1cf0ddb8b.png)<br />
<strong>Blog Listing</strong>
![6](https://user-images.githubusercontent.com/18494848/42441536-0bc31ac8-8386-11e8-80bd-dd7e675b2cdc.png)<br />
<strong>Add new blog</strong>
![7](https://user-images.githubusercontent.com/18494848/42441545-0d6c9ce6-8386-11e8-9d27-9fdf83e307b6.png)<br />
<strong>Edit Blog</strong>
![8](https://user-images.githubusercontent.com/18494848/42441543-0d3ad1b6-8386-11e8-8e82-9421c264f12b.png)<br />
<strong>Show Blog</strong>
![9](https://user-images.githubusercontent.com/18494848/42441531-0ac10ee6-8386-11e8-9f1b-da0f4c482119.png)<br />
<strong>Inquiries Listing</strong>
![10](https://user-images.githubusercontent.com/18494848/42441542-0ce1c8c8-8386-11e8-8d69-36e92e8edd0b.png)<br />
<strong>Extra Pages</strong>
![11](https://user-images.githubusercontent.com/18494848/42442366-1cfc9a06-8388-11e8-803f-f6ad958eb65e.png)<br />
<strong>Edit Extra Pages</strong>
![12](https://user-images.githubusercontent.com/18494848/42442460-54df763c-8388-11e8-9c6a-66a3d295e8fe.png)<br />
<strong>FAQs</strong>
![13](https://user-images.githubusercontent.com/18494848/42442365-1cb69e20-8388-11e8-914c-3578c14fcd9d.png)<br />
<strong>Testimonials</strong>
![14](https://user-images.githubusercontent.com/18494848/42442364-1c7044e8-8388-11e8-8182-eb64f43a7dff.png)<br />
<strong>Forgot Password</strong>
![15](https://user-images.githubusercontent.com/18494848/43072103-88807382-8e92-11e8-9b24-59fccc7e9163.png)<br />
<strong>Reset Password</strong>
![16](https://user-images.githubusercontent.com/18494848/43072188-de15b5d2-8e92-11e8-97fd-74cafaeb19a9.png)