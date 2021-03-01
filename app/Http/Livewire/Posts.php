<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class Posts extends Component
{
    use WithPagination;

    public $perPage = 9;
    public $post;
    public $showPost = false;

    protected $listeners = ['show', 'deleted' => '$refresh', 'saved' => '$refresh'];

    public function render()
    {
        return view('livewire.posts', [
            'posts' => Post::with(['category'])->paginate($this->perPage),
            'categories' => Category::all(),
            'popularPosts' => Post::with(['category'])->orderBy('visits', 'desc')->limit(5)->get(),
        ]);
    }

    public function show(Post $post)
    {
        $this->showPost = true;
        $post->visits++;
        $post->save();
        $this->post = $post;
    }

    public function back()
    {
        $this->showPost = false;
    }
}
