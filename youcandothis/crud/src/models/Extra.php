<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Input;
use Image;
class Extra extends Model
{
    protected $table='extras'; 
    protected $dates=['created_at'];
    protected $fillable = [
    'title','description','code', 'image'
    ];
    public function setImageAttribute($file) 
    {
        $source_path = upload_tmp_path($file);
        if ($file && file_exists($source_path)) 
        {
            upload_move($file,'image');            
            Image::make($source_path)->resize(1905, 294)->save($source_path);
            upload_move($file,'image','front');
            Image::make($source_path)->resize(75, 75)->save($source_path);
            upload_move($file,'image','thumb');
            @unlink($source_path);
        }
        $this->attributes['image'] = $file;
        if ($file == '') 
        {
            $this->deleteFile();
            $this->attributes['image'] = "";
        }
    }
    public function image_url($type='original') 
    {
        if (!empty($this->image))
            return upload_url($this->image,'image',$type);
        elseif (!empty($this->image) && file_exists(tmp_path($this->image)))
            return tmp_url($this->$image);
        else
            return asset('images/default_ad_thumb.png');
    }
    public function deleteFile() 
    {
        upload_delete($this->photo,'image',array('original','thumb'));
    }
}