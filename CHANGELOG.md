# Changelog

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
