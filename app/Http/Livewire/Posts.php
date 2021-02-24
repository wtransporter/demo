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

    protected $listeners = ['show', 'deleted' => '$refresh'];

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
}
