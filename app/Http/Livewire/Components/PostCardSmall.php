<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class PostCardSmall extends Component
{
    public $post;
    
    public function render()
    {
        return view('livewire.components.post-card-small');
    }
}
