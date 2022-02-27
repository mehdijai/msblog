<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;
use App\Models\Category;

class Navigation extends Component
{
    public $page_type = "posts";
    
    public function render()
    {
        $categories = Category::all();
        return view('livewire.components.navigation', compact('categories'));
    }
}
