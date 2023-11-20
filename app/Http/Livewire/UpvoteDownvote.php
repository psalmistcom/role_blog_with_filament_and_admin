<?php

namespace App\Http\Livewire;

use App\Models\Post;
use App\Models\UpvoteDownvote as ModelsUpvoteDownvote;
use Livewire\Component;

class UpvoteDownvote extends Component
{
    public Post $post;

    public function mount(Post $post)
    {
        $this->post = $post;
    }

    public function render()
    {
        $upvotes = ModelsUpvoteDownvote::where('post_id', '=', $this->post->id)
            ->where('is_upvote', '=', true)
            ->count();

        $downvotes = ModelsUpvoteDownvote::where('post_id', '=', $this->post->id)
            ->where('is_upvote', '=', false)
            ->count();

        return view('livewire.upvote-downvote', compact('upvotes', 'downvotes'));
    }
}
