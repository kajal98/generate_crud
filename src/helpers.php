<?php

use Intervention\Image\Drivers\Gd\Driver as GdDriver;
use Intervention\Image\ImageManager;

if (! function_exists('register_time_zone')) {
    function register_time_zone()
    {
        $ip_address = request()->ip();
        $jsondata = @file_get_contents('https://ipapi.co/'.$ip_address.'/json/');

        return $jsondata ? json_decode($jsondata) : null;
    }
}

if (! function_exists('get_phone_code')) {
    // Requires the optional pragmarx/countries package.
    function get_phone_code($country_name)
    {
        return \PragmaRX\Countries\Package\Countries::where('cca2', $country_name)->first()->dialling->calling_code[0];
    }
}

if (! function_exists('price_dropdown')) {
    function price_dropdown($q)
    {
        $ret = [
            '0-3k' => ['min' => '0', 'max' => '3000'],
            '3k-6k' => ['min' => '3000', 'max' => '6000'],
            '6k-9k' => ['min' => '6000', 'max' => '9000'],
            '9k-12k' => ['min' => '9000', 'max' => '12000'],
            '12k-15k' => ['min' => '12000', 'max' => '15000'],
        ];

        return $ret[$q];
    }
}

if (! function_exists('get_timezone')) {
    function get_timezone($time, $time_zone)
    {
        return \Carbon\Carbon::parse($time)->setTimezone(new DateTimeZone($time_zone));
    }
}

if (! function_exists('send_message')) {
    // Sends an SMS through msg91 using config('crud.sms').
    function send_message($message, $mobile_number)
    {
        $auth_key = config('crud.sms.msg91_auth_key');
        if (empty($auth_key) || empty($mobile_number)) {
            return false;
        }

        $response = \Illuminate\Support\Facades\Http::timeout(30)->get('https://api.msg91.com/api/sendhttp.php', [
            'sender' => config('crud.sms.msg91_sender'),
            'route' => 4,
            'authkey' => $auth_key,
            'country' => 91,
            'mobiles' => $mobile_number,
            'message' => $message,
        ]);

        return $response->successful();
    }
}

if (! function_exists('crud_resize_image')) {
    function crud_resize_image($path, $width, $height)
    {
        ImageManager::usingDriver(GdDriver::class)
            ->decodePath($path)
            ->resize($width, $height)
            ->save($path);
    }
}

if (! function_exists('upload_tmp_path')) {
    function upload_tmp_path($file)
    {
        return public_path("tmp/$file");
    }
}

if (! function_exists('upload_tmp_url')) {
    function upload_tmp_url($file)
    {
        return asset("tmp/$file");
    }
}

if (! function_exists('upload_path')) {
    function upload_path($file, $model, $variation = false, $relative = null)
    {
        $use_aws = is_null($relative) ? config('crud.uploads.s3') : $relative;
        $folder = '/uploads/'.(empty($variation) || $variation == 'original' ? $model : "{$model}-{$variation}");

        if (! $use_aws && ! is_array($variation) && ! file_exists(public_path().$folder)) {
            @mkdir(public_path().$folder, 0755, true);
        }

        return ($use_aws ? '' : public_path())."$folder/$file";
    }
}

if (! function_exists('upload_url')) {
    function upload_url($file, $model, $variation = false)
    {
        $use_aws = config('crud.uploads.s3');
        $folder = '/uploads/'.(empty($variation) || $variation == 'original' ? $model : "{$model}-{$variation}");
        if (! empty($file)) {
            return $use_aws ? config('crud.uploads.s3_url')."$folder/$file" : asset("$folder/$file");
        }

        return false;
    }
}

if (! function_exists('upload_move')) {
    // crud.uploads.s3 = true requires the optional aws/aws-sdk-php-laravel package.
    function upload_move($file, $model, $variation = false, $source = false)
    {
        $use_aws = config('crud.uploads.s3');
        $source = $source ? $source : upload_tmp_path($file);
        $target = upload_path($file, $model, $variation);
        if ($use_aws) {
            $s3 = \AWS::createClient('s3');
            $s3->putObject([
                'Bucket' => config('crud.uploads.s3_bucket'),
                'Key' => $target,
                'SourceFile' => $source,
                'ACL' => 'public-read',
            ]);
        } else {
            copy($source, $target);
        }
    }
}

if (! function_exists('upload_delete')) {
    function upload_delete($file, $model, $variations = false)
    {
        if (empty($file)) {
            return false;
        }
        if (is_array($variations)) {
            foreach ($variations as $variation) {
                @unlink(upload_path($file, $model, $variation, false));
            }
        }
        if (config('crud.uploads.s3')) {
            $s3 = \AWS::createClient('s3');
            $s3->deleteObject([
                'Bucket' => config('crud.uploads.s3_bucket'),
                'Key' => upload_path($file, $model, $variations, true),
            ]);
        }
    }
}
