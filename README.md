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

![register](https://user-images.githubusercontent.com/18494848/42377118-85616acc-813f-11e8-813c-80ccb0365a0e.png)
![login](https://user-images.githubusercontent.com/18494848/42377119-85ac06d6-813f-11e8-832b-cd11a469157f.png)
![dashboard](https://user-images.githubusercontent.com/18494848/42377120-85f56f60-813f-11e8-8130-8309c8cda01a.png)
![change](https://user-images.githubusercontent.com/18494848/42377116-84ee8124-813f-11e8-8da5-3c8231707ac3.png)
![listing](https://user-images.githubusercontent.com/18494848/42377121-863c6df2-813f-11e8-90fa-2768f1ee861c.png)
![add](https://user-images.githubusercontent.com/18494848/42377117-8518ed38-813f-11e8-9351-8c63b106c570.png)
![edit](https://user-images.githubusercontent.com/18494848/42377114-84c23f1a-813f-11e8-89cb-052b7abb03a6.png)
![show](https://user-images.githubusercontent.com/18494848/42377112-849a5856-813f-11e8-85e6-f5862e96b8c1.png)
