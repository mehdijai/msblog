<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class ModuleCard extends Component
{
    public $module;
    
    public function render()
    {
        return view('livewire.components.module-card');
    }
}
