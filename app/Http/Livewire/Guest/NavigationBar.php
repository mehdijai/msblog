<?php

namespace App\Http\Livewire\Guest;

use Livewire\Component;

class NavigationBar extends Component
{
    public $menu_items = [];

    public function mount()
    {

        $this->menu_items = [
            [
                'name'      =>   'Home',
                'link'      =>   route('home'),
                'route'      =>  'home',
                'highlited' =>   false,
            ],
            [
                'name'      =>   'Modules',
                'link'      =>   route('modules'),
                'route'      =>  'modules',
                'highlited' =>   false,
            ],
            [
                'name'      =>   'Posts',
                'link'      =>   route('posts'),
                'route'      =>  'posts',
                'highlited' =>   false,
            ],
            [
                'name'      =>   'About',
                'link'      =>   route('about'),
                'route'      =>  'about',
                'highlited' =>   false,
            ],
            [
                'name'      =>   'Contact',
                'link'      =>   route('contact'),
                'route'      =>  'contact',
                'highlited' =>   false,
            ],
            [
                'name'      =>   'Hire us',
                'link'      =>   'https://www.medostudios.com',
                'route'      =>  '',
                'highlited' =>   true,
            ],
        ];
    }

    public function render()
    {
        return view('livewire.guest.navigation-bar');
    }
}
