<?php

namespace App\Models;

use App\Models\Step;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function author()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function steps()
    {
        return $this->hasMany(Step::class);
    }

    public function imagePath()
    {
        $path = 'storage/images' . '/' . $this->id . '/' . $this->image;
        
        if (!file_exists($path)) {
            return 'images/potatoe.jpeg';
        } else {
            return url($path);
        }
    }
    
    public function thumb()
    {
        $path = 'storage/images/thumbs' . '/' . $this->id . '/' . $this->image;

        if (!file_exists($path)) {
            return 'images/potatoe.jpeg';
        } else {
            return url($path);
        }
    }
}
