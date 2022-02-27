<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class PostCard extends Component
{

    public $post;
    public $class;
    
    public function render()
    {
        return view('livewire.components.post-card');
    }
}
