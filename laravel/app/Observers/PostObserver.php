<?php

namespace App\Observers;

use App\Models\Post;
use Illuminate\Support\Str;

class PostObserver
{
    /**
     * @param Post $post
     */

    public function creating(Post $post)
    {
        $post->slug = Str::slug($post->title);
        if(!isset($post->user_id)){
            $post->user()->associate(auth()->user());
        }
    }

    /**
     * @param Post $post
     */
    public function updating(Post $post)
    {
        $post->slug = Str::slug($post->title);
        $post->user()->associate(auth()->user());
    }

    public function created(Post $post)
    {

    }

    /**
     * @param Post $post
     */
    public function updated(Post $post)
    {
        //
    }

    /**
     * @param Post $post
     */
    public function deleted(Post $post)
    {
        //
    }

    /**
     * @param Post $post
     */
    public function restored(Post $post)
    {
        //
    }

    /**
     * @param Post $post
     */
    public function forceDeleted(Post $post)
    {
        //
    }
}
