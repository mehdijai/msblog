<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class Metadata extends Component
{
    public $meta_data;
    public $og_meta_data;
    public $schema_markup;

    public function render()
    {
        return view('livewire.components.metadata');
    }
}
