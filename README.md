# Laravel Admin Panel (publish-and-own)

[![Latest Version](https://img.shields.io/packagist/v/kajalpandya/generate_laravel_crud.svg)](https://packagist.org/packages/kajalpandya/generate_laravel_crud)
[![Tests](https://github.com/kajal98/generate_crud/actions/workflows/tests.yml/badge.svg)](https://github.com/kajal98/generate_crud/actions/workflows/tests.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/kajalpandya/generate_laravel_crud.svg)](https://packagist.org/packages/kajalpandya/generate_laravel_crud)
[![License](https://img.shields.io/packagist/l/kajalpandya/generate_laravel_crud.svg)](LICENSE)

A ready-made admin panel for **Laravel 13**, built with **Blade** or **Livewire**. One command copies the controllers (or Livewire components), models, views, migrations and seeders into your app, so the code is yours to read and change.

**You get:** admin login, users, blog with categories and slugs, FAQs, testimonials, extra pages, feedback, inquiries, site settings, and profile and password management.

```bash
composer require kajalpandya/generate_laravel_crud
php artisan crud:install
php artisan migrate
php artisan db:seed --class=CrudSeeder
```

Open `/admin/login` and sign in with `admin@gmail.com` / `admin2018`. Change that password straight away.

![Dashboard](https://user-images.githubusercontent.com/18494848/42441533-0b282a68-8386-11e8-8a5d-e2abf16bb18b.png)

**Requires:** PHP 8.3+ and Laravel 13.

## Choosing a stack

`crud:install` asks which stack you want, or you can pass it directly:

```bash
php artisan crud:install blade      # controllers + Blade views
php artisan crud:install livewire   # Livewire 4 components, live search, no page reloads
```

If Livewire isn't installed yet, the command runs `composer require livewire/livewire` for you.

| | Blade | Livewire |
| --- | --- | --- |
| Pages | `app/Http/Controllers/Admin` | `app/Livewire/Admin` |
| Views | `resources/views/admin` | `resources/views/livewire/admin` |
| Lists | DataTables (client side) | Paginated, live search |
| Rich text | CKEditor | Plain textarea |
| Image upload | plupload to `/admin/upload` | Livewire file uploads |

Both stacks share the models, seeders, layouts and URLs, and install `routes/crud.php`, which is loaded from `routes/web.php`.

## What gets installed

* **Models:** `app/Models` (Blog, BlogCategory, Extra, Faq, Feedback, Inquiry, SiteSetting, Testimonial). Your `User` model is left alone; the panel doesn't rely on its `$fillable`.
* **Migrations:** published with the current timestamp. One migration adds admin columns (`role`, `active`, `phone` and others) to Laravel's default `users` table.
* **Seeders:** `database/seeders/CrudSeeder.php` and one seeder per table.
* **Assets:** `public/vendor/crud`.

Existing files are never overwritten. The command lists any it skipped; run it with `--force` to replace them.

## Configuration

```bash
php artisan vendor:publish --tag=crud-config
```

`config/crud.php` sets the admin roles, upload storage (local or S3) and the msg91 SMS key:

| `.env` key | Used for |
| --- | --- |
| `CRUD_UPLOADS_S3`, `AWS_S3_BUCKET`, `AWS_S3_HOST` | Store uploads on S3 (needs `aws/aws-sdk-php-laravel`) |
| `MSG91_AUTH_KEY`, `MSG91_SENDER` | SMS when a user is activated |

## Testing

```bash
composer test
```

## Upgrading from v3

* **Security:** v1–v3 published `public/plupload/upload.php`, which lets anyone upload files to your server without logging in. Delete `public/plupload/` from your app now, whether or not you upgrade.
* Install with `php artisan crud:install blade` instead of `vendor:publish --tag=crud`. Run it with `--force` to replace the v3 files.
* Assets moved from `public/css`, `public/js`, `public/images` and `public/fonts` to `public/vendor/crud`. Remove the old copies if nothing else in your app uses them.
* The front-end `/login`, `/register` and password-reset pages (laravel/ui) are gone. They clashed with Laravel's starter kits. The admin panel keeps its own `/admin/login`.
* Logout is now a POST request to `/admin/logout`.
* The `/` route is no longer taken over by the panel.
* The package namespace is now `KajalPandya\LaravelCrud`.

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