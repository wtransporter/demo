<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SinglePost extends Component
{
    public $singlePost;

    public function show()
    {
        $this->emitUp('show', $this->singlePost);
    }

    public function delete()
    {
        $this->singlePost->delete();
        $this->emitUp('deleted');
    }
    
    public function render()
    {
        return view('livewire.single-post');
    }
}
