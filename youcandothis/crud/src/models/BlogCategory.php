<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
class BlogCategory extends Model
{
    use Sluggable;
    protected $fillable = [ 'name' ];
    public function sluggable()
    {
        return [
        'slug' => [
        'source' => 'name',
        'onUpdate' => true
        ]
        ];
    }
    public function blogs() {
        return $this->hasMany('App\Blog','blog_category_id');
    }
}
