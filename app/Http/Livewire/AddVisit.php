<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AddVisit extends Component
{
    public $post;

    public function addVisit()
    {
        $this->post->increment('visits');

        return redirect()->route('posts.show', $this->post);
    }

    public function render()
    {
        return view('livewire.add-visit');
    }
}
