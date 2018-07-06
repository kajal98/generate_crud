<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Image;
class Blog extends Model 
{
    use Sluggable;
    public function sluggable()
    {
        return [
        'slug' => [
        'source' => 'title',
        'onUpdate' => true
        ]
        ];
    }
    protected $fillable = ['title','blog_category_id','description','image','author','publish','is_archive','meta_title','meta_keyword','meta_description'];
    public function blog_category()
    {
        return $this->belongsTo('App\BlogCategory');
    }
    public function author()
    {
        return $this->belongsTo('App\Author');
    }
    public function setImageAttribute($file) {
        $source_path = upload_tmp_path($file);
        if ($file && file_exists($source_path)) 
        {
            upload_move($file,'blog');
            Image::make($source_path)->resize(946,470)->save($source_path);
            upload_move($file,'blog','front');
            Image::make($source_path)->resize(708, 464)->save($source_path);
            upload_move($file,'blog','medium');
            Image::make($source_path)->resize(58, 58)->save($source_path);
            upload_move($file,'blog','thumb');
            @unlink($source_path);
            $this->deleteFile();
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
            return upload_url($this->image,'blog',$type);
        elseif (!empty($this->image) && file_exists(tmp_path($this->image)))
            return tmp_url($this->$image);
        else
            return asset('images/default-blog.jpg');
    }
    public function deleteFile() 
    {
        upload_delete($this->image,'blog',array('original','thumb','medium'));
    }
}