<?php

namespace App\Mail;

use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewPostAlert extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * @var Post
     */
    protected Post $post;

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
        return $this->subject('New Post Alert')
        ->markdown('emails.newpostalert')
        ->with([
            'site' => $this->post->site->name,
            'title' => $this->post->title,
            'description' => $this->post->description,
        ]);
    }
}
