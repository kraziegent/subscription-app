<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Support\Facades\Artisan;

class PostService
{
    /**
     * Store a new post in the database.
     *
     * @param array $data
     * @return Post
     */
    public function storePost(array $data)
    {
        $post = Post::create($data);

        $this->notifySubscribers($post);

        return $post;
    }

    /**
     * Notify subscribers of a new post.
     *
     * @param  Post  $post
     * @return void
     */
    public function notifySubscribers(Post $post)
    {
        $subscribers = $post->site->subscribers;

        Artisan::queue('email:new-post-alert', [
            'subscribers' => $subscribers->pluck('id')->toArray(),
            'post' => $post->id
        ]);
    }
}
