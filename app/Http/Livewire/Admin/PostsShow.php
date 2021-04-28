<?php

namespace App\Http\Livewire\Admin;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class PostsShow extends Component
{
    use WithPagination;
    
    public $modelId;
    public $confirmingItemDeletion;
    public $active;
    
    public function render()
    {
        return view('livewire.admin.posts-show', [
        'posts' => Post::paginate(8)
        ]);
    }

    public function delete()
    {
        $post = Post::findOrFail($this->modelId);
        $post->delete();
        $this->confirmingItemDeletion = false;
        $this->emit('toTop');
    }

    public function confirmDelete($id)
    {
        $this->confirmingItemDeletion = true;
        $this->modelId = $id;
    }

    public function changeStatus($id)
    {
        $this->modelId = $id;
        $this->toggleStatus();
    }

    public function toggleStatus()
    {
        $data = Post::find($this->modelId);
        $data->status = !$data->status;
        $data->save();
    }

    public function gotoPage($page)
    {
        $this->setPage($page);
        $this->emit('toTop');
    }
}
