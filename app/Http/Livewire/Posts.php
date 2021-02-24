<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class Posts extends Component
{
    use WithPagination;

    public $perPage = 6;
    public $post;
    public $showPost = false;
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
        return view('livewire.posts', [
            'posts' => Post::paginate($this->perPage),
            'categories' => Category::all()
        ]);
    }

    public function show(Post $post)
    {
        $this->showPost = true;
        $this->post = $post;
    }

    public function back()
    {
        $this->showPost = false;
    }

    public function save()
    {
        $attributes = $this->validate();
        $attributes['image'] = 'potatoe.jpeg';
        Post::create($attributes);

        $this->reset();
    }
}
