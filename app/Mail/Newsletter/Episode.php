<?php

namespace App\Mail\Newsletter;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Episode extends Mailable
{
    use Queueable, SerializesModels;

    public $subscriber;
    public $episode;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->subscriber = $data['subscriber'];
        $this->episode = $data['episode'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("New MSBlog episode!")->markdown('mail.newsletter.episode');
    }
}
