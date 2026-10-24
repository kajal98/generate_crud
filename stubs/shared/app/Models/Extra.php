<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Extra extends Model
{
    protected $table = 'extras';

    protected $fillable = ['title', 'description', 'code', 'image'];

    public function setImageAttribute($file)
    {
        $source_path = upload_tmp_path($file);
        if ($file && file_exists($source_path)) {
            upload_move($file, 'image');
            crud_resize_image($source_path, 1905, 294);
            upload_move($file, 'image', 'front');
            crud_resize_image($source_path, 75, 75);
            upload_move($file, 'image', 'thumb');
            @unlink($source_path);
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
            return upload_url($this->image, 'image', $type);
        }

        return asset('vendor/crud/images/default.jpg');
    }

    public function deleteFile()
    {
        upload_delete($this->image, 'image', ['original', 'thumb', 'front']);
    }
}
