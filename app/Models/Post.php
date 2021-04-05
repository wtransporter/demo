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

    public function ingredients()
    {
        return $this->hasMany(Ingredients::class);
    }

    public function imagePath()
    {
        if (!file_exists($this->pathToImage())) {
            return $this->demoImage();
        }

        return url($this->pathToImage());
    }
    
    public function thumb()
    {        
        if (!file_exists($this->pathToImage('thumbs/'))) {
            return $this->demoImage();
        }

        return url($this->pathToImage('thumbs/'));
    }

    public function pathToImage($thumb = '')
    {
        return 'storage/images/'. $thumb . $this->id . '/' . $this->image;
    }

    public function demoImage()
    {
        return asset('images/demo.jpg');
    }
}
