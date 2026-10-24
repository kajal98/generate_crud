# Changelog

## v4.0.0 (unreleased)

- **Security:** removed `public/plupload/upload.php`, an unauthenticated upload script that allowed remote code execution. Uploads now go through an authenticated, image-only `/admin/upload` route.
- **Security:** user-supplied text is escaped in all views; logout is POST-only; admin login is rate limited and regenerates the session.
- New `php artisan crud:install` command with a Blade or Livewire stack choice
- New Livewire 4 stack: components for every section, live search, pagination and Livewire file uploads
- `config/crud.php` for admin roles, uploads and SMS; no more `env()` calls outside config
- Standard package layout (`src/`, `config/`, `database/`, `resources/`, `stubs/`, `tests/`) and `KajalPandya\LaravelCrud` namespace
- Migrations are published with current timestamps (`publishesMigrations`)
- Assets publish to `public/vendor/crud`, and unused bundles and font sources were removed (19 MB to 9 MB)
- Removed laravel/ui front-end auth and the `/` route override
- Fixed the panel layout not loading jQuery (the page loader never cleared), delete buttons, and image upload never loading plupload
- Package test suite (Testbench) and GitHub Actions CI

## v3.0.0 (2026-10-24)

- Laravel 13 and PHP 8.3+ support
- Models publish to `App\Models`, seeders to `Database\Seeders` (`CrudSeeder`), routes to `routes/crud.php`
- Publish tags: `crud`, `crud-app`, `crud-views`, `crud-database`, `crud-assets`
- The `admin` middleware and helpers are registered by the package; no manual setup
- The users migration now alters Laravel's default `users` table
- Removed `laravelcollective/html` and `spatie/laravel-newsletter`
- Fixed broken list-page links, the admin login layout, checkbox saving, extras delete and the feedback toggle
- MIT license

## v2.0 (2023-02-20)

- Laravel 10 support
