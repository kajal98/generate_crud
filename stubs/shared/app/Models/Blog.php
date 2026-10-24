<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Blog extends Model
{
    use Sluggable;

    protected $fillable = ['title', 'blog_category_id', 'description', 'image', 'author', 'publish', 'is_archive', 'meta_title', 'meta_keyword', 'meta_description'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
                'onUpdate' => true,
            ],
        ];
    }

    public function blog_category(): BelongsTo
    {
        return $this->belongsTo(BlogCategory::class);
    }

    public function setImageAttribute($file)
    {
        $source_path = upload_tmp_path($file);
        if ($file && file_exists($source_path)) {
            upload_move($file, 'blog');
            crud_resize_image($source_path, 946, 470);
            upload_move($file, 'blog', 'front');
            crud_resize_image($source_path, 708, 464);
            upload_move($file, 'blog', 'medium');
            crud_resize_image($source_path, 58, 58);
            upload_move($file, 'blog', 'thumb');
            @unlink($source_path);
            $this->deleteFile();
        }
        $this->attributes['image'] = $file;
        if ($file == '') {
            $this->deleteFile();
            $this->attributes['image'] = '';
        }
    }

    public function image_url($type = 'original')
    {
        if (! empty($this->image)) {
            return upload_url($this->image, 'blog', $type);
        }

        return asset('vendor/crud/images/default.jpg');
    }

    public function deleteFile()
    {
        upload_delete($this->image, 'blog', ['original', 'thumb', 'medium']);
    }
}
