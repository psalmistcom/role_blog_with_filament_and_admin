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

    public function upvotedownvote($upvote = true)
    {
        $user = request()->user();

        if (!$user) {
            return $this->redirect('login');
        }

        if (!$user->hasVerifiedEmail()) {
            return $this->redirect('verification.notice');
        }

        $upvoteDownvote = UpvoteDownvote::where('post_id', '=', $this->post->id)
            ->where('user_id', '=', $user->id)
            ->first();

        if ($upvoteDownvote) {
            UpvoteDownvote::create([
                'is_upvote' => $upvote,
                'post_id' => $this->post->id,
                'user_id' => $user->id
            ]);
        }
    }
}
