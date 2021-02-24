<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use App\Models\Category;

class CreatePost extends Component
{
    public $description;
    public $body;
    public $title;
    public $category_id;

    protected $rules = [
        'category_id' => 'required|exists:categories,id',
        'title' => 'required',
        'description' => 'required|min:10',
        'body' => 'required|min:10',
    ];

    public function render()
    {
        return view('livewire.create-post', [
            'categories' => Category::all()
        ]);
    }

    public function save()
    {
        $attributes = $this->validate();
        $attributes['image'] = 'potatoe.jpeg';
        Post::create($attributes);

        $this->reset();
    }
}
