<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class Separator extends Component
{
    public $class;
    public $dir = 'h';
    
    public function render()
    {
        return view('livewire.components.separator');
    }
}
