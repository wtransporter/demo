<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class Posts extends Component
{
    use WithPagination;

    public $perPage = 9;
    public $post;

    protected $listeners = ['deleted' => 'refreshPage', 'saved' => '$refresh'];

    public function refreshPage()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.posts', [
            'posts' => Post::with(['category'])->active()->paginate($this->perPage)
        ]);
    }

    public function gotoPage($page)
    {
        $this->setPage($page);
        $this->emit('toTop');
    }
}
