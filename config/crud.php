<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Admin roles
    |--------------------------------------------------------------------------
    |
    | Users whose "role" column matches one of these values can open the
    | admin panel. Everyone else is redirected away by the "admin" middleware.
    |
    */

    'admin_roles' => ['admin', 'super admin'],

    /*
    |--------------------------------------------------------------------------
    | Uploads
    |--------------------------------------------------------------------------
    |
    | Images are resized and stored under public/uploads. Set "s3" to true to
    | push them to S3 instead (requires aws/aws-sdk-php-laravel).
    |
    */

    'uploads' => [
        's3' => (bool) env('CRUD_UPLOADS_S3', env('AWS_STATUS', false)),
        's3_bucket' => env('AWS_S3_BUCKET'),
        's3_url' => env('AWS_S3_HOST'),
    ],

    /*
    |--------------------------------------------------------------------------
    | SMS
    |--------------------------------------------------------------------------
    |
    | Used by send_message() to text users when their account is activated.
    | Leave the key empty to turn SMS off.
    |
    */

    'sms' => [
        'msg91_auth_key' => env('MSG91_AUTH_KEY'),
        'msg91_sender' => env('MSG91_SENDER', 'CRUDAP'),
    ],

];
