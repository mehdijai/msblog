<?php

namespace App\Http\Livewire\Guest;

use App\Models\Post;
use Livewire\Component;

class Footer extends Component
{

    public $social_media_links = [];

    public $footer_featured = [];

    public function mount()
    {
        $this->social_media_links = [
            [
                'name' => 'icons.instagram',
                'link' => 'https://www.instagram.com/medostudios',
            ],
            [
                'name' => 'icons.facebook',
                'link' => 'https://www.fb.com/medostudios',
            ],
            [
                'name' => 'icons.telegram',
                'link' => 'https://te.me/medostudios',
            ],
        ];

        $this->footer_featured = [
            [
                'name'      =>   'All posts',
                'link'      =>   route('posts'),
            ],
            [
                'name'      =>   'Terms of Service',
                'link'      =>   route('terms.show'),
            ],
            [
                'name'      =>   'Privacy Policy',
                'link'      =>   route('policy.show'),
            ],
        ];
    }

    public function render()
    {
        return view('livewire.guest.footer');
    }
}
