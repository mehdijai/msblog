<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class PostComponent extends Component
{
    /**
     * ? Post: Dynamic page
     * * Post
     * * Article
     */
    
    public $post;
    public $meta_data;
    public $og_meta_data;

    public function render()
    {
        return view('livewire.components.post-component');
    }
}
