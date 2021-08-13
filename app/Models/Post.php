<?php

namespace App\Models;

use App\Models\Step;
use App\Models\Category;
use App\Traits\HasImagePath;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory, HasImagePath;

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
        return $this->hasMany(Ingredient::class);
    }

    public function parentId()
    {
        return $this->id;
    }
}
