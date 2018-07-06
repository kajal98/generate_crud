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

## Register provider
then put this line to your config/app.php file in providers array
<strong>Youcandothis\Crud\CrudServiceProvider::class,</strong>

## Clear the cache
<strong>$ php artisan config:cache</strong>

## Auto load files
<strong>$ composer dump-autoload</strong>

## Finaly publish the provider
<strong>$ php artisan vendor:publish --provider="Youcandothis\Crud\CrudServiceProvider"</strong>


## Register middleware in app\Http\Kernel.php in $routeMiddleware group
<strong>'admin' => \App\Http\Middleware\AdminOnly::class,</strong>

## autoload helper file in your composer.json file under "autoload-dev" array
"files": [
    "app/helpers.php"
]

then run localhost:8000

Have fun..!!!!!

## Screenshots
<img src="https://user-images.githubusercontent.com/38377336/41842629-f98082c2-7888-11e8-8972-37c59baf1c3f.jpg" alt="Template 1">

<img src="/ss/Show.png" alt="Template 1">