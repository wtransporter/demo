<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FeaturePost extends Component
{
    public $featuredPost;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($featuredPost)
    {
        $this->featuredPost = $featuredPost;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.feature-post');
    }
}
