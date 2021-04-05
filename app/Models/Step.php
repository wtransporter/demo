<?php

namespace App\Models;

use App\Models\Post;
use App\Traits\HasImagePath;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Step extends Model
{
    use HasFactory, HasImagePath;

    protected $guarded = ['id'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function parentID()
    {
        return $this->post->id;
    }

    // public function imagePath()
    // {
    //     $file = 'storage/images/thumbs/' . $this->post->id . '/' . $this->image;
    //     if (file_exists($file)) {
    //         return $file;
    //     }
    // }
}
