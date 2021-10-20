<?php

use PragmaRX\Countries\Package\Countries;

function register_time_zone()
{
  // Get IP address
  $ip_address = getenv('HTTP_CLIENT_IP') ?: getenv('HTTP_X_FORWARDED_FOR') ?: getenv('HTTP_X_FORWARDED') ?: getenv('HTTP_FORWARDED_FOR') ?: getenv('HTTP_FORWARDED') ?: getenv('REMOTE_ADDR');
  // $ip_address = '110.174.165.78';

  //Get JSON object
  $jsondata = file_get_contents("https://freegeoip.net/json/" . $ip_address);
      $data = json_decode($jsondata);
      return $data;
}

function get_phone_code($country_name)
{
  return Countries::where('cca2', $country_name)->first()->dialling->calling_code[0];
}

function price_dropdown($q)
{
  $ret = array(
      '0-3k'    => array('min'=>'0','max'=>'3000'),
      '3k-6k'   => array('min'=>'0','max'=>'3000'),
      '6k-9k'   => array('min'=>'0','max'=>'3000'),
      '9k-12k'  => array('min'=>'0','max'=>'3000'),
      '12k-15k' => array('min'=>'0','max'=>'3000'),
  );
  return $ret[$q];
}

function get_timezone($time, $time_zone) {      
      $time = \Carbon\Carbon::parse($time);
      $otherTZ = new DateTimeZone($time_zone);
      $final_time = $time->setTimezone($otherTZ);
  return $final_time;
}

function send_message($message, $mobile_number) {
  $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => "http://api.msg91.com/api/sendhttp.php?sender=eDOCTR&route=4&authkey=195132Ar696cyUGuu5a69da63&encrypt=&country=91&mobiles=" . $mobile_number . "&message=" . $message,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_SSL_VERIFYHOST => 0,
      CURLOPT_SSL_VERIFYPEER => 0,
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      return false;
    } else {
      return true;
    }
}

function upload_tmp_path($file) {
  return public_path() . "/tmp/$file";
}
function upload_tmp_url($file) {
  return asset("tmp/$file");
}
function upload_path($file, $model, $variation=false, $relative=null) {
  $use_aws = is_null($relative)? env('AWS_STATUS',false) : $relative;
  $folder = "/uploads/". ( empty($variation) || $variation =='original' ? $model : "{$model}-{$variation}" ); 

  if (!$use_aws && !is_array($variation) && !file_exists(public_path().$folder)) {
      umask(0);
      @mkdir(public_path().$folder, 0777, true);
    }
  $target_path = ($use_aws? "" : public_path()) ."$folder/$file";
  return $target_path;
}
function upload_url($file, $model, $variation=false)  {
  $use_aws = env('AWS_STATUS',false);
  $folder = "/uploads/". ( empty($variation)  || $variation =='original' ? $model : "{$model}-{$variation}" );
  if(!empty($file)) {
    if($use_aws)
      return env('AWS_S3_HOST')."$folder/$file";
    else
      return asset("$folder/$file");
  } 
  return false;
}
function upload_move($file,$model,$variation=false,$source=false) {
  $use_aws = env('AWS_STATUS',false);
  $source = $source ? $source : upload_tmp_path($file);
  $target = upload_path($file,$model,$variation);
  if($use_aws) {
      $s3 = AWS::createClient('s3');
      $s3->putObject(array(
            'Bucket'     => env('AWS_S3_BUCKET'),
            'Key'        => $target,
            'SourceFile' => $source,
            'ACL'    => 'public-read'
        ));
  } else {
     copy($source, $target);
  }
}

function upload_delete($file,$model,$variations=false) {
  if(empty($file)) return false;;
  if(is_array($variations)) {
    foreach($variations as $variation){
        $local_path = upload_path($file,$model,$variation,false);
        @unlink($local_path);
    } 
  }
  $use_aws = env('AWS_STATUS',false);    
  if($use_aws) {
    $aws_path = upload_path($file,$model,$variations,true);
    $s3 = AWS::createClient('s3');
    $s3->deleteObject(array(
          'Bucket'     => env('AWS_S3_BUCKET'),
          'Key'        => $aws_path,          
        ));     
  }

}