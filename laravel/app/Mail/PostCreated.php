<?php

namespace App\Mail;

use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PostCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $post;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from('from@test.com')
            ->to('to@test.com')
            ->view('mails.created_post', [
                'post' => $this->post
            ])
            ->attach(storage_path('app/public/images/6e1e4cbc5606ec33a8b99463e76ab4de5f2a34b90015e5377940e63ab3316673.jpeg'));
    }
}
