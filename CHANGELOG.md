# Changelog

## v3.0.1 (2026-10-24)

- **Security:** removed `public/plupload/upload.php` from the published assets. The script accepted unauthenticated uploads with a filename chosen by the client, which allowed arbitrary files (including PHP) to be written to the public folder and run. Apps that already published it must delete `public/plupload/upload.php` themselves.

## v3.0.0 (2026-10-24)

- Laravel 13 and PHP 8.3+ support

## v2.0 (2023-02-20)

- Laravel 10 support
