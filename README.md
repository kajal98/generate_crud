# Laravel CRUD admin panel

A ready-made admin panel (users, blogs, blog categories, FAQs, testimonials, extra pages, feedback, inquiries and site settings) that you publish into your own Laravel app and own outright.

**Requires:** PHP 8.3+ and Laravel 13.

## Install

Start from a fresh Laravel 13 app with your database configured in `.env`:

```bash
composer require kajalpandya/generate_laravel_crud
```

The service provider and the `admin` middleware are registered automatically.

## Publish the panel

```bash
php artisan vendor:publish --tag=crud
```

This copies:

| Tag | What | Where |
| --- | --- | --- |
| `crud-app` | controllers, models, routes | `app/Http/Controllers`, `app/Models`, `routes/crud.php` |
| `crud-views` | Blade views | `resources/views` |
| `crud-database` | migrations, seeders | `database/migrations`, `database/seeders` |
| `crud-assets` | CSS, JS, fonts, images | `public` |

Existing files are never overwritten. Your app already has `app/Models/User.php`, so either publish with `--force` or add the panel's extra fields (`last_name`, `role`, `active`, `phone`, `mobile`, `address`, `city`, `state`, `country`, `pincode`) to your `User` model's `$fillable`.

## Wire up the routes

Add this line to the end of `routes/web.php`:

```php
require __DIR__.'/crud.php';
```

## Migrate and seed

The panel's migrations add columns to Laravel's default `users` table, so keep the default migrations.

```bash
php artisan migrate
php artisan db:seed --class=CrudSeeder
```

Then visit `/admin/login` and sign in with `admin@gmail.com` / `admin2018`. Change this password straight away.

Create a `public/tmp` folder if you use image uploads.

## Optional settings

| `.env` key | Used for |
| --- | --- |
| `MSG91_AUTH_KEY`, `MSG91_SENDER` | SMS on user activation (`send_message()`) |
| `AWS_STATUS`, `AWS_S3_BUCKET`, `AWS_S3_HOST` | Store uploads on S3 (needs `aws/aws-sdk-php-laravel`) |

## Generate views for an entity

```bash
php artisan generate:crud Product --views
```

## Upgrading from v2 (Laravel 10)

* Models now live in `App\Models` (was `App\`).
* Seeders live in `database/seeders` under `Database\Seeders`. `DatabaseSeeder` is now `CrudSeeder`.
* The users migration now alters the default `users` table instead of replacing it. The `password_resets` migration is gone, because Laravel 13 ships `password_reset_tokens`.
* The `admin` middleware comes from the package. Remove `App\Http\Middleware\AdminOnly` if you published it before.
* `helpers.php` is autoloaded by the package. Remove the `app/helpers.php` entry from your `composer.json`.
* `laravelcollective/html` and `spatie/laravel-newsletter` are no longer installed.

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