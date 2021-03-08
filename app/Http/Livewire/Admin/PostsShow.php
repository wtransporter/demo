<?php

namespace App\Http\Livewire\Admin;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class PostsShow extends Component
{
    use WithPagination;
    
    public $confirmDelete;
    
    public function render()
    {
        return view('livewire.admin.posts-show', [
        'posts' => Post::paginate(8)
        ]);
    }

    public function delete($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
    }

    public function confirmDelete($id)
    {
        $this->confirmDelete = $id;
    }

    public function cancelDelete()
    {
        $this->reset('confirmDelete');
    }

    public function gotoPage($page)
    {
        $this->setPage($page);
        $this->emit('toTop');
    }
}
